<?php

namespace App\Helpers;

use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Product;
use App\Models\User;
use Exception;

class DistributeOrderAmountHelper
{
    public static function sendIncomesToAccounts($order){
        $product = Product::find($order->product_id);
        $total_order_price = $order->price;
        $user = $order->user;

        if($product->direct_income > 0)
        {
            $refer_by = User::find($user->refer_by);
            if($refer_by)
            {
                $direct_amount = $product->direct_income * $order->quantity;
                $refer_by->update([
                    'balance' => $refer_by->balance += $direct_amount,
                ]);         
                Earning::create([
                    'due_to' => $user->id, 
                    'user_id' => $refer_by->id, 
                    'price' => $direct_amount, 
                    'type' => 'direct_income', 
                ]);
                $total_order_price = $total_order_price - $direct_amount;
            }
        }
        
        if($product->personal_reward>0)
        {
            $personal_reward_amount = $product->personal_reward * $order->quantity;
            $user->update([
                'balance' => $user->balance += $personal_reward_amount,
            ]);         
            Earning::create([
                'due_to' => $user->id, 
                'user_id' => $user->id, 
                'price' => $personal_reward_amount, 
                'type' => 'personal_reward', 
            ]);        
            $total_order_price = $total_order_price - $personal_reward_amount;
        }
        if($product->product_income>0)
        {
            $product_income= CompanyAccount::product_income();
            $product_amount = $product->product_income * $order->quantity;
            $product_income->update([
                'balance' => $product_income->balance += $product_amount,
            ]);
            $total_order_price = $total_order_price - $product_amount;
        }
        if($product->expense_income>0)
        {
            $expense_amount = $product->expense_income * $order->quantity;    
            $expense_income= CompanyAccount::expense_income();
            $expense_income->update([
                'balance' => $expense_income->balance += $expense_amount,
            ]);
            $total_order_price = $total_order_price - $expense_amount;
        }
        if($product->flash_income>0)
        {
            $flash_amount = $product->flash_income * $order->quantity;        
            $flash_income= CompanyAccount::flash_income();
            $flash_income->update([
                'balance' => $flash_income->balance += $flash_amount,
            ]);
            $total_order_price = $total_order_price - $flash_amount;
        }
        if($product->reward_income>0)
        {
            $reward_amount = $product->reward_income * $order->quantity;        
            $reward_income= CompanyAccount::reward_income();
            $reward_income->update([
                'balance' => $reward_income->balance += $reward_amount,
            ]);
            $total_order_price = $total_order_price - $reward_amount;
        }
        if($product->loss_income>0)
        {
            $loss_amount = $product->loss_income * $order->quantity;        
            $loss_income= CompanyAccount::loss_income();
            $loss_income->update([
                'balance' => $loss_income->balance += $loss_amount,
            ]);
            $total_order_price = $total_order_price - $loss_amount;
        }
        if($product->salary>0)
        {
            $salary_amount = $product->salary * $order->quantity;        
            $salary= CompanyAccount::salary();
            $salary->update([
                'balance' => $salary->balance += $salary_amount,
            ]);
            $total_order_price = $total_order_price - $salary_amount;
        }
        if($total_order_price>0)
        {
            $flash_income= CompanyAccount::flash_income();
            $flash_income->update([
                'balance' => $flash_income->balance += $total_order_price,
            ]);
        }

    } 
    public static function addIndirectIncome($order)
    {
        try{
            $user = $order->user;
            $product = Product::find($order->product_id);
            $parents = $user->getParents();
            foreach($product->product_levels  as $index => $level)
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