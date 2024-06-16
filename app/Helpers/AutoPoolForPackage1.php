<?php

namespace App\Helpers;

use App\Models\User;
use Exception;

class AutoPoolForPackage1
{

    public static function addUserInTree($user,$main_user)
    {
        try{
            if(count(AutoPoolForPackage1::autoPoolLevel1($main_user)) < config('services.levels.1'))
            {
                AutoPoolForPackage1::addUserinLevel_1($user,$main_user);
            }else if(count(AutoPoolForPackage1::autoPoolLevel2($main_user)) < config('services.levels.2'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel1($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
            }else if(count(AutoPoolForPackage1::autoPoolLevel3($main_user)) < config('services.levels.3'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel2($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
    
            }else if(count(AutoPoolForPackage1::autoPoolLevel4($main_user)) < config('services.levels.4'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel3($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
    
            }else if(count(AutoPoolForPackage1::autoPoolLevel5($main_user)) < config('services.levels.5'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel4($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
    
            }else if(count(AutoPoolForPackage1::autoPoolLevel6($main_user)) < config('services.levels.6'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel5($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
    
            }else if(count(AutoPoolForPackage1::autoPoolLevel7($main_user)) < config('services.levels.7'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel6($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
    
            }else if(count(AutoPoolForPackage1::autoPoolLevel8($main_user)) < config('services.levels.8'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel7($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel9($main_user)) < config('services.levels.9'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel8($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel10($main_user)) < config('services.levels.10'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel9($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel11($main_user)) < config('services.levels.11'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel10($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel12($main_user)) < config('services.levels.12'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel11($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel13($main_user)) < config('services.levels.13'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel12($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
            }else if(count(AutoPoolForPackage1::autoPoolLevel14($main_user)) < config('services.levels.14'))
            {
                $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel13($main_user))->get();
                AutoPoolForPackage1::addUserinLevels($user,$old_users);
                
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
    public static function addUserinLevel_1($user,$main_user)
    {
        if(!$main_user->left_refferal_package_1)
        {
            $main_user->update([
                'left_refferal_package_1' => $user->id, 
            ]);
        }else{
            $main_user->update([
                'right_refferal_package_1' => $user->id, 
            ]);
        }
        $user->update([
            'autopool_package_1' => 1
        ]);
    }
    public static function addUserinLevels($user,$old_users)
    {
        foreach($old_users as $old_user)
        {
            if(!$old_user->left_refferal_package_1)
            {
                $old_user->update([
                    'left_refferal_package_1' => $user->id, 
                ]);
                break;
            }else if(!$old_user->right_refferal_package_1){
                $old_user->update([
                    'right_refferal_package_1' => $user->id, 
                ]);  
                break;              
            }

        }
        $user->update([
            'autopool_package_1' => 1
        ]);
    }
    public static function autoPoolLevel1($user)
    {
        $users = [];
        if($user->left_refferal_package_1)
            $users[] = $user->left_refferal_package_1;
        if($user->right_refferal_package_1)
            $users[] = $user->right_refferal_package_1;
        return $users;
    }
    public static function autoPoolLevel2($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel1($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel3($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel2($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel4($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel3($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel5($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel4($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel6($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel5($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel7($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel6($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel8($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel7($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel9($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel8($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel10($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel9($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel11($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel10($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel12($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel11($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel13($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel12($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function autoPoolLevel14($user)
    {
        
        $old_users = User::whereIn('id',AutoPoolForPackage1::autoPoolLevel13($user))->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal_package_1)
                $users[] = $old_user->left_refferal_package_1;
            if($old_user->right_refferal_package_1)
                $users[] = $old_user->right_refferal_package_1;
        }
        return $users;
    }
    public static function getLevelStatus($level,$user)
    {
        if($level == 1)
            return AutoPoolForPackage1::autoPoolLevel1($user);
        else if($level == 2)
        return AutoPoolForPackage1::autoPoolLevel2($user);
        else if($level == 3)
        return AutoPoolForPackage1::autoPoolLevel3($user);
        else if($level == 4)
        return AutoPoolForPackage1::autoPoolLevel4($user);
        else if($level == 5)
        return AutoPoolForPackage1::autoPoolLevel5($user);
        else if($level == 6)
        return AutoPoolForPackage1::autoPoolLevel6($user);
        else if($level == 7)
        return AutoPoolForPackage1::autoPoolLevel7($user);
        else if($level == 8)
        return AutoPoolForPackage1::autoPoolLevel8($user);
        else if($level == 9)
        return AutoPoolForPackage1::autoPoolLevel9($user);
        else if($level == 10)
        return AutoPoolForPackage1::autoPoolLevel10($user);
        else if($level == 11)
        return AutoPoolForPackage1::autoPoolLevel11($user);
        else if($level == 12)
        return AutoPoolForPackage1::autoPoolLevel12($user);
        else if($level == 13)
        return AutoPoolForPackage1::autoPoolLevel13($user);
        else if($level == 14)
        return AutoPoolForPackage1::autoPoolLevel14($user);
        return [];
    }
}