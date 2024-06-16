<?php

namespace App\Helpers;

use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;
use Exception;

class IndirectIncomeHelper
{

    public static function addIndirectIncome($user,$package)
    {
        try{
            $parents = $user->getParents();
            foreach($package->package_levels  as $index => $level)
            {
                if($parents[$index])
                {
                    $parents[$index]->update([
                        'balance' => $parents[$index]->balance + $level->amount, 
                    ]);
                    Earning::create([
                        'user_id' => $parents[$index]->id, 
                        'due_to' => $user->id, 
                        'price' => $level->amount, 
                        'type' => 'indirect_income', 
                    ]);
                }else{
                    $flash_income= CompanyAccount::flash_income();
                    $flash_income->update([
                        'balance' => $flash_income->balance += $level->amount,
                    ]);
                }
            }
            return true;
        }catch(Exception $e)
        {
            info("Add User In Tree : ".$e->getMessage());
            return false;
        }
    } 
}