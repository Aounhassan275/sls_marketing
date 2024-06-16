<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\IndirectIncomeHelper;
use App\Helpers\Message;
use App\Helpers\RefferralHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\ReferralLog;
use App\Models\User;
use App\Models\CompanyAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function active($id)
    {
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
        $package = Package::find($deposit->package_id);
        if($user->refer_by && $user->checkStatus() == 'fresh')
        {
            if(!$user->notInTree())
            {
                toastr()->error('User is Already in Tree Successfully');
                return back();
            }
            $refer_by = User::find($user->refer_by);
            $status = RefferralHelper::addUserInTree($user,$package,$refer_by); 
            if(!$status)
            {
                toastr()->error('Something Went Wrong');
                return back();
            }
            IndirectIncomeHelper::addIndirectIncome($user,$package); 
        }else{
            if($user->refer_by)
            {
                $refer_by = User::find($user->refer_by);
                RefferralHelper::directEarning($user,$package,$refer_by); 
                IndirectIncomeHelper::addIndirectIncome($user,$package);
            }
        }
        $user->update([
            'status' => 'active',
            'pending_amount' => $user->pending_amount += $package->price,
            'a_date' => Carbon::today(),
            'package_id' => $deposit->package_id
        ]);
        $product_income= CompanyAccount::product_income();
        $product_income->update([
            'balance' => $product_income->balance += $package->product_income,
        ]);
        $expense_income= CompanyAccount::expense_income();
        $expense_income->update([
            'balance' => $expense_income->balance += $package->expense_income,
        ]);
        $flash_income= CompanyAccount::flash_income();
        $flash_income->update([
            'balance' => $flash_income->balance += $package->flash_income,
        ]);
        $reward_income= CompanyAccount::reward_income();
        $reward_income->update([
            'balance' => $reward_income->balance += $package->reward_income,
        ]);
        $loss_income= CompanyAccount::loss_income();
        $loss_income->update([
            'balance' => $loss_income->balance += $package->loss_income,
        ]);
        $salary= CompanyAccount::salary();
        $salary->update([
            'balance' => $salary->balance += $package->salary,
        ]);
        $deposit->update([
            'status' => 'old'
        ]);
        toastr()->success('User is Active Successfully');
        return redirect()->back();
    }
    public function delete($id){
        $deposit = Deposit::find($id);
        $user = $deposit->user; 
          $user->update([
            'status' => 'pending'
        ]);
        $deposit->delete();
        toastr()->success('Deposit Request is Deleted Successfully');
        return redirect()->back();
    }
    public function ManageMatchingEarning()
    {
        $users = User::where('status','active')->get();
        foreach($users as $user)
        {
            $left_price = 0;
            $right_price = 0;
            if($user->right_refferal)
            {
                $rights =  $user->getOrginalRight();
                foreach($rights as $right)
                {
                    $right_price = $right_price + $right->package->price/100 *5;
                }
            }
            if($user->left_refferal)
            {
                $lefts =  $user->getOrginalLeft();
                foreach($lefts as $left)
                {
                    $left_price = $left_price + $left->package->price/100 *5;
                }
            }
            $user->update([
            //    'left_amount' => $user->left_amount += $left_price,
               'left_amount' => 0,
            //    'right_amount' => $user->right_amount += $right_price,
               'right_amount' => 0,
            ]);
        }
        // dd($users);
        return 'Done';
    }
}
