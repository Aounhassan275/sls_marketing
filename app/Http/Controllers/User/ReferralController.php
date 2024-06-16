<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Payment;
use App\Models\ReferralLog;
use App\Models\CompanyAccount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReferralController extends Controller
{
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    public function leftReferral($id)
    {
        $user = Auth::user(); 
        $company_account= CompanyAccount::find(1);
        $owner_left_refer = User::find($id);
        $refer_by = User::find($user->refer_by);
        $deposit = Deposit::where('user_id',$user->id)->where('package_id',$user->package_id)->first();
        $direct_income = $deposit->amount/100 * 10;
        $matching_income = $deposit->amount/100 * 5;
        if($owner_left_refer->left_refferal == null)
        {
            $refer_by->update([
                'balance' => $refer_by->balance += $direct_income,
                'r_earning' => $refer_by->r_earning += $direct_income,
            ]);
            $owner_left_refer->update([
                'left_refferal' => $user->id,
                'left_amount' =>  $matching_income,
            ]);
            $user->update([
                'top_referral' => 'Done',
            ]);
            Earning::create([
                "user_id" => $refer_by->id,
                "price" => $direct_income,
                "type" => 'direct_income'
            ]);
            $company_account->update([
                'balance' => $company_account->balance -= $direct_income,
            ]);
            $chain = $owner_left_refer;
            for($i = 0;$i < 1000;$i++)
            {
                $referrral_chain = User::where('left_refferal',$chain->id)->orWhere('right_refferal',$chain->id)->first();
                Log::info('Matching Earning to ' . $referrral_chain->name);
                if($referrral_chain->left_refferal == $chain->id)
                {
                    $referrral_chain->update([
                        'left_amount' =>   $referrral_chain->left_amount += $matching_income,
                    ]);
                }else{
                    $referrral_chain->update([
                        'right_amount' =>   $referrral_chain->right_amount += $matching_income,
                    ]);
                }
                if($chain->left_amount > $chain->right_amount)
                {
                    $amount = $chain->right_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => 0, 
                            'left_amount' => $chain->left_amount -= $amount, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }else if($chain->right_amount > $chain->left_amount)
                {
                    $amount = $chain->left_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => $chain->right_amount -= $amount, 
                            'left_amount' => 0, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }else{
                    $amount = $chain->left_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => 0, 
                            'left_amount' => 0, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }
                $chain = $referrral_chain;
                if($referrral_chain->id == $user->main_owner)
                {
                    if($chain->left_amount > $chain->right_amount)
                    {
                        $amount = $chain->right_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => 0, 
                                'left_amount' => $chain->left_amount -= $amount, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }else if($chain->right_amount > $chain->left_amount)
                    {
                        $amount = $chain->left_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => $chain->right_amount -= $amount, 
                                'left_amount' => 0, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }else{
                        $amount = $chain->left_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => 0, 
                                'left_amount' => 0, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }
                    $i = 1000;
                }
            }
        }
        toastr()->success('You Added In Tree Successfully.');
        return redirect('user/dashboard');
    }
    public function showTree($id)
    {
        $user = User::find($id);
        $left = null;
        $right = null;
        if($user->left_refferal)
        {
            $left = User::find($user->left_refferal);
        }
        if($user->right_refferal)
        {
            $right = User::find($user->right_refferal);
        }
        return view($this->directory.'.refer.user_tree')->with('user',$user)->with('left',$left)->with('right',$right);
   
    }    
    public function showRightLeg($id)
    {
        $user = User::find($id);
        if($user->checkStatus() == 'expired')   
        {
          toastr()->error('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        return view($this->directory.'.refer.right_refferal')->with('user',$user);
    }
    public function showLeftLeg($id)
    {
        $user = User::find($id);
        if($user->checkStatus() == 'expired')   
        {
          toastr()->error('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        return view($this->directory.'.refer.left_refferal')->with('user',$user);
    }
    public function RightReferral($id)
    {
        $user = Auth::user(); 
        if($user->checkStatus() == 'expired')   
        {
          toastr()->error('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $company_account= CompanyAccount::find(1);
        $owner_right_refer = User::find($id);
        $refer_by = User::find($user->refer_by);
        $deposit = Deposit::where('user_id',$user->id)->where('package_id',$user->package_id)->first();
        $direct_income = $deposit->amount/100 * 10;
        $matching_income = $deposit->amount/100 * 5;
        if($owner_right_refer->right_refferal == null)
        {
            $refer_by->update([
                'balance' => $refer_by->balance += $direct_income,
                'r_earning' => $refer_by->r_earning += $direct_income,
            ]);
            $owner_right_refer->update([
                'right_refferal' => $user->id,
                'right_amount' =>  $matching_income,
            ]);
            $user->update([
                'top_referral' => 'Done',
            ]);
            Earning::create([
                "user_id" => $refer_by->id,
                "price" => $direct_income,
                "type" => 'direct_income'
            ]);
            $company_account->update([
                'balance' => $company_account->balance -= $direct_income,
            ]);
            $chain = $owner_right_refer;
            for($i = 0;$i < 1000;$i++)
            {
                $referrral_chain = User::where('left_refferal',$chain->id)->orWhere('right_refferal',$chain->id)->first();
                if($referrral_chain->left_refferal == $chain->id)
                {
                    $referrral_chain->update([
                        'left_amount' =>   $referrral_chain->left_amount += $matching_income,
                    ]);
                }else{
                    $referrral_chain->update([
                        'right_amount' =>   $referrral_chain->right_amount += $matching_income,
                    ]);
                }
                if($chain->left_amount > $chain->right_amount)
                {
                    $amount = $chain->right_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => 0, 
                            'left_amount' => $chain->left_amount -= $amount, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }else if($chain->right_amount > $chain->left_amount)
                {
                    $amount = $chain->left_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => $chain->right_amount -= $amount, 
                            'left_amount' => 0, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }else{
                    $amount = $chain->left_amount*2;
                    if($amount > 0)
                    {
                        $chain->update([
                            'right_amount' => 0, 
                            'left_amount' => 0, 
                            'balance' => $chain->balance += $amount,
                            'r_earning' => $chain->r_earning += $amount,
                        ]);
                        Earning::create([
                            "user_id" => $chain->id,
                            "price" => $amount,
                            "type" => 'matching_income'
                        ]);
                        $company_account->update([
                            'balance' => $company_account->balance -= $amount,
                        ]);
                    }
                }
                $chain = $referrral_chain;
                if($referrral_chain->id == $user->main_owner)
                {
                    if($chain->left_amount > $chain->right_amount)
                    {
                        $amount = $chain->right_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => 0, 
                                'left_amount' => $chain->left_amount -= $amount, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }else if($chain->right_amount > $chain->left_amount)
                    {
                        $amount = $chain->left_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => $chain->right_amount -= $amount, 
                                'left_amount' => 0, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }else{
                        $amount = $chain->left_amount*2;
                        if($amount > 0)
                        {
                            $chain->update([
                                'right_amount' => 0, 
                                'left_amount' => 0, 
                                'balance' => $chain->balance += $amount,
                                'r_earning' => $chain->r_earning += $amount,
                            ]);
                            Earning::create([
                                "user_id" => $chain->id,
                                "price" => $amount,
                                "type" => 'matching_income'
                            ]);
                            $company_account->update([
                                'balance' => $company_account->balance -= $amount,
                            ]);
                        }
                    }
                    $i = 1000;
                }
            }
        }
        toastr()->success('You Added In Tree Successfully.');
        return redirect('user/dashboard');
    }
}
