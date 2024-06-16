<?php

namespace App\Helpers;

use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;
use Exception;

class RefferralHelper
{

    public static function addUserInTree($user,$package,$refer_by)
    {
        try{
            if(count($refer_by->level_1()) < config('services.levels.1'))
            {
                RefferralHelper::addUserinLevel_1($user,$package,$refer_by);
            }else if(count($refer_by->level_2()) < config('services.levels.2'))
            {
                $old_users = User::whereIn('id',$refer_by->level_1())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
            }else if(count($refer_by->level_3()) < config('services.levels.3'))
            {
                $old_users = User::whereIn('id',$refer_by->level_2())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
    
            }else if(count($refer_by->level_4()) < config('services.levels.4'))
            {
                $old_users = User::whereIn('id',$refer_by->level_3())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
    
            }else if(count($refer_by->level_5()) < config('services.levels.5'))
            {
                $old_users = User::whereIn('id',$refer_by->level_4())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
    
            }else if(count($refer_by->level_6()) < config('services.levels.6'))
            {
                $old_users = User::whereIn('id',$refer_by->level_5())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
    
            }else if(count($refer_by->level_7()) < config('services.levels.7'))
            {
                $old_users = User::whereIn('id',$refer_by->level_6())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
    
            }else if(count($refer_by->level_8()) < config('services.levels.8'))
            {
                $old_users = User::whereIn('id',$refer_by->level_7())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_9()) < config('services.levels.9'))
            {
                $old_users = User::whereIn('id',$refer_by->level_8())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_10()) < config('services.levels.10'))
            {
                $old_users = User::whereIn('id',$refer_by->level_9())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_11()) < config('services.levels.11'))
            {
                $old_users = User::whereIn('id',$refer_by->level_10())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_12()) < config('services.levels.12'))
            {
                $old_users = User::whereIn('id',$refer_by->level_11())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_13()) < config('services.levels.13'))
            {
                $old_users = User::whereIn('id',$refer_by->level_12())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else if(count($refer_by->level_14()) < config('services.levels.14'))
            {
                $old_users = User::whereIn('id',$refer_by->level_13())->get();
                RefferralHelper::addUserinLevels($user,$package,$refer_by,$old_users);
                
            }else{
                return false;
            }
            return true;
        }catch(Exception $e)
        {
            info("Add User In Tree : ".$e->getMessage());
            return false;
        }
    } 
    public static function addUserinLevel_1($user,$package,$refer_by)
    {
        if(!$refer_by->left_refferal)
        {
            $refer_by->update([
                'left_refferal' => $user->id, 
                'balance' => $refer_by->balance + $package->direct_income, 
            ]);
        }else{
            $refer_by->update([
                'right_refferal' => $user->id, 
                'balance' => $refer_by->balance + $package->direct_income, 
            ]);
            
        }
        Earning::create([
            'due_to' => $user->id, 
            'user_id' => $refer_by->id, 
            'price' => $package->direct_income, 
            'type' => 'direct_income', 
        ]);
    }
    public static function addUserinLevels($user,$package,$refer_by,$old_users)
    {
        foreach($old_users as $old_user)
        {
            if(!$old_user->left_refferal)
            {
                $old_user->update([
                    'left_refferal' => $user->id, 
                ]);
                break;
            }else if(!$old_user->right_refferal){
                $old_user->update([
                    'right_refferal' => $user->id, 
                ]);  
                break;              
            }

        }
        $refer_by->update([
            'balance' => $refer_by->balance + $package->direct_income, 
        ]);
        
        Earning::create([
            'due_to' => $user->id, 
            'user_id' => $refer_by->id, 
            'price' => $package->direct_income, 
            'type' => 'direct_income', 
        ]);
    }
    public static function directEarning($user,$package,$refer_by)
    {
        
        $refer_by->update([
            'balance' => $refer_by->balance + $package->direct_income, 
        ]);
        Earning::create([
            'due_to' => $user->id, 
            'user_id' => $refer_by->id, 
            'price' => $package->direct_income, 
            'type' => 'direct_income', 
        ]);
    }
}