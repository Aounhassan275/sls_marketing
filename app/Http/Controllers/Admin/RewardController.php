<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reward.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(Reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reward = Reward::find($id);
        return view('admin.reward.edit',compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $reward = Reward::find($id);
        $reward->update($request->all());
        toastr()->success('Reward Informations Updated successfully');
        return redirect()->to(route('admin.reward.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reward $reward)
    {
        //
    }
    public function leaderStore(Request $request)
    {
        $users = User::where('is_leader',1)->get();
        $reward_income= CompanyAccount::reward_income();
        if($request->amount > $reward_income->balance)
        {
            toastr()->error('Reward Account is Empty');
            return back();
        }
        if($users->count() > 0)
        {
            $amount = $request->amount/$users->count();
            foreach($users as $user)
            {
                $user->update([
                    'balance' => $user->balance += $amount,
                ]);         
                Earning::create([
                    'due_to' => $user->id, 
                    'user_id' => $user->id, 
                    'price' => $amount, 
                    'type' => 'leader_reward', 
                ]);  
            }
            
        $reward_income->update([
            'balance' => $reward_income->balance -= $request->amount,
        ]);
            toastr()->success('Reward Transfer Leader successfully');
        }else{
            toastr()->error('No Leader Found');
        }
        return back();
    }
}
