<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Reward;
use App\Models\User;
use App\Helpers\AutoPoolForPackage1;
use App\Helpers\AutoPoolForpackage2;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($creds))
        {
            toastr()->success('You Login Successfully');
            return redirect()->intended(route('admin.dashboard.index'));
        } else {
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }
    public function add_earning()
    {
        info("Ads Earning Conrjob Started At" . date("d-M-Y h:i a"));
		$day = date('Y-m-d', strtotime("-1 days"));
		info("Ads Earning CRONJOB:   $day");
        $users = User::where('a_date','!=',null)
                ->get();
        $company_account= CompanyAccount::find(1);
		if ($users) {
            $total_users = $users->count();
            info("Ads Earning CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Ads Earning CRONJOB User : $user->name");
                $earning = Earning::where('type','ad_earning')->where('created_at',$day)->first();
                if(!$earning && $user->checkstatus() !='expired')
                {
                    info("Ads Earning CRONJOB Don't have earning");
                    $amount = $user->package->day/$user->package->ads;
                    if($user->balance >= $amount)
                    {
                        info("Ads Earning CRONJOB $user->name balance is $user->balance more than $amount ad earning");
                        $company_account->update([
                            'balance' => $company_account->balance += $user->package->day/$user->package->ads,
                        ]);
                        $user->balance-=($user->package->day/$user->package->ads);
                        $user->save();
                    }else{
                        info("Ads Earning CRONJOB $user->name balance is $user->balance less than $amount ad earning");
                    }
                }else{
                    info("Ads Earning CRONJOB have ad earning");
                }
            }

		} else {
			info("Ads Earning CRONJOB CRONJOB: Users not found. ");
		}
		info("Ads Earning CRONJOB CRONJOB END AT " . date("d-M-Y h:i a"));
    }
    public function expire_order()
    {
		$day = date('Y-m-d', strtotime("-30 days"));
        $orders = Order::where('created_at','<',$day)->where('status','!=','Delivered')->where('status','!=','Expired')->get();
        foreach($orders as $order)
        {
            $order->update([
                'status' => 'Expired'
            ]);
        }
        toastr()->success('Order More Than 30 Days Expired Successfully');
        return redirect()->back();
                
    }
    public function block_users()
    {
        info("Expire User Conrjob Started At" . date("d-M-Y h:i a"));
        $users = User::where('a_date','!=',null)
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Expire User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Expire User CRONJOB User : $user->name");
                if($user->checkstatus() =='expired')
                {
                    info("Ads Earning CRONJOB Don't have earning");
                    $user->status = 'block';
                    $user->balance = 0;
                    $user->save();    
                }
            }

		} else {
			info("Expire User CRONJOB: Users not found. ");
		}
		info("Expire User CRONJOB END AT " . date("d-M-Y h:i a"));
    }
    public function add_reward()
    {
        info("Add Reward To User Conrjob Started At" . date("d-M-Y h:i a"));
        $users = User::where('a_date','!=',null)->get();
		if ($users) {
            $total_users = $users->count();
            info("Add Reward to User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Add Reward to User CRONJOB User : $user->name");
                foreach($user->package->package_level_rewards()->where('type',1)->get() as $key => $reward)
                {
                    $index = $key+1;
                    if(config('services.levels.'.$index) == count($user->getLevelStatus($index)))
                    {
                        info("Add Reward to User CRONJOB User Service Level $index");
                        if(!$user->getLevelRewardStatus($index) && $reward->title != "NIL")
                        {
                            info("Add Reward to User CRONJOB User Service Level $index is added ");
                            Reward::create([
                                'user_id' => $user->id,
                                'package_level_reward_id' => $reward->id,
                                'level' => 'level_'.$index,
                                'name' => $reward->title,
                            ]);
                        }
                    }
                }   
            }
		} else {
			info("Add Reward to User CRONJOB: Users not found. ");
		}
		info("Add Reward to User CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Add Reward Cronjob Run Successfully');
        return back();
    }
    public function add_reward_for_autopool_package_1()
    {
        info("Add Reward For Auto Pool  Package 1To User Conrjob Started At" . date("d-M-Y h:i a"));
        $package = Package::where('price',3000)->first();
        $users = User::where('package_id',$package->id)->where('autopool_package_1',1)->get();		
        if ($users) {
            $total_users = $users->count();
            info("Add Reward For Auto Pool  Package 1 to User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Add Reward For Auto Pool  Package 1 to User CRONJOB User : $user->name");
                foreach($user->package->package_level_rewards()->where('type',2)->get() as $key => $reward)
                {
                    $index = $key+1;
                    if(config('services.levels.'.$index) == count(AutoPoolForPackage1::getLevelStatus($index,$user)))
                    {
                        info("Add Reward For Auto Pool  Package 1 to User CRONJOB User Service Level $index");
                        if(!$user->getLevelRewardStatusForAutoPoolPackage1($index) && $reward->title != "NIL")
                        {
                            info("Add Reward For Auto Pool  Package 1 to User CRONJOB User Service Level $index is added ");
                            Reward::create([
                                'user_id' => $user->id,
                                'package_level_reward_id' => $reward->id,
                                'level' => 'auto_pool_package_1_level_'.$index,
                                'name' => $reward->title,
                            ]);
                        }
                    }
                }   
            }
		} else {
			info("Add Reward For Auto Pool  Package 1 to User CRONJOB: Users not found. ");
		}
		info("Add Reward For Auto Pool Package 1 to User CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Add Reward For Auto Pool Package 1 Cronjob Run Successfully');
        return back();
    }
    public function add_reward_for_autopool_package_2()
    {
        info("Add Reward For Auto Pool  Package 2 To User Conrjob Started At" . date("d-M-Y h:i a"));
        $package = Package::where('price',40000)->first();
        $users = User::where('package_id',$package->id)->where('autopool_package_2',1)->get();
		if ($users) {
            $total_users = $users->count();
            info("Add Reward For Auto Pool  Package 2 to User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Add Reward For Auto Pool  Package 2 to User CRONJOB User : $user->name");
                foreach($user->package->package_level_rewards()->where('type',2)->get() as $key => $reward)
                {
                    $index = $key+1;
                    if(config('services.levels.'.$index) == count(AutoPoolForPackage2::getLevelStatus($index,$user)))
                    {
                        info("Add Reward For Auto Pool  Package 2 to User CRONJOB User Service Level $index");
                        if(!$user->getLevelRewardStatusForAutoPoolPackage2($index) && $reward->title != "NIL")
                        {
                            info("Add Reward For Auto Pool  Package 2 to User CRONJOB User Service Level $index is added ");
                            Reward::create([
                                'user_id' => $user->id,
                                'package_level_reward_id' => $reward->id,
                                'level' => 'auto_pool_package_2_level_'.$index,
                                'name' => $reward->title,
                            ]);
                        }
                    }
                }   
            }
		} else {
			info("Add Reward For Auto Pool  Package 2 to User CRONJOB: Users not found. ");
		}
		info("Add Reward For Auto Pool Package 2 to User CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Add Reward For Auto Pool Package 2 Cronjob Run Successfully');
        return back();
    }
    public function makeLeaderOnLevel6()
    {
        info("Add make Leader On Level 6 in User Conrjob Started At" . date("d-M-Y h:i a"));
        $users = User::where('is_leader',0)->get();
		if ($users) {
            $total_users = $users->count();
            info("Add make Leader On Level 6 in User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Add make Leader On Level 6 in User CRONJOB User : $user->name");         
                if(config('services.levels.6') == count($user->getLevelStatus(6)))
                {
                    $user->update([
                        'is_leader' => 1
                    ]);
                }
            }
		} else {
			info("Add make Leader On Level 6 in User CRONJOB: Users not found. ");
		}
		info("Add make Leader On Level 6 in User CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Add make Leader On Level 6 in User Cronjob Run Successfully');
        return back();
    }
    public function add_autopool_for_package_1()
    {
        $package = Package::where('price',3000)->first();
        $users = User::where('package_id',$package->id)->where('id','!=',1)->where('autopool_package_1',0)->get();
        $main_user = User::find(1);
		if ($users->count() > 0) {
            $total_users = $users->count();
            info("Add Autopool For Package 1 to User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                if($user->refers->where('package_id',$package->id)->count() >= 2)
                {
                    info("Add AutoPool For Package 1 adding in tree for: $user->name");
                    AutoPoolForPackage1::addUserInTree($user,$main_user);
                }else{
                    info("Add AutoPool For Package 1 referral are less than 2 for : $user->name");
                }
            }
		} else {
			info("Add AutoPool For Package 1 CRONJOB: Users not found. ");
		}
		info("Add AutoPool For Package 1 CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Auto Pool Package 1 Cronjob Run Successfully');
        return back();
    }
    public function add_autopool_for_package_2()
    {
        $package = Package::where('price',40000)->first();
        $users = User::where('package_id',$package->id)->where('autopool_package_2',0)->get();
        $main_user = User::find(1);
		if ($users) {
            $total_users = $users->count();
            info("Add Autopool For Package 2 to User CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Add AutoPool For Package 2 to User CRONJOB User : $user->name");
                if($user->refers->where('package_id',$package->id)->count() >= 2)
                {
                    AutoPoolForpackage2::addUserInTree($user,$main_user);
                }
            }
		} else {
			info("Add AutoPool For Package 2 CRONJOB: Users not found. ");
		}
		info("Add AutoPool For Package 2 CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Auto Pool Package 2 Cronjob Run Successfully');
        return back();
    }
    public function clearAutoPoolTree()
    {
        $users = User::all();
        foreach($users as $user)
        {
            $user->update([
                'left_refferal_package_1' => null,
                'right_refferal_package_1' => null,
                'left_refferal_package_2' => null,
                'right_refferal_package_2' => null,
                'autopool_package_1' => 0,
                'autopool_package_2' => 0,
            ]);
        }
        toastr()->success('Auto Pool Tree Cleared');
        return back();
    }
}
