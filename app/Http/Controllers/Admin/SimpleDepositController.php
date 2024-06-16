<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SimpleDeposit;
use Illuminate\Http\Request;

class SimpleDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.simple-deposit.index');
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
     * @param  \App\Models\SimpleDeposit  $simpleDeposit
     * @return \Illuminate\Http\Response
     */
    public function show(SimpleDeposit $simpleDeposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpleDeposit  $simpleDeposit
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleDeposit $simpleDeposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpleDeposit  $simpleDeposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleDeposit $simpleDeposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpleDeposit  $simpleDeposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleDeposit $simpleDeposit)
    {
        //
    }
    public function completed($id)
    {
        $deposit = SimpleDeposit::find($id);
        $deposit->update([
            'status' => 'Completed'
        ]);
        $user = $deposit->user;
        $user->update([
            'balance' => $user->balance += $deposit->amount
        ]);
        toastr()->warning('Status Updated!');
        return back();
    }
    public function rejected($id)
    {
        $deposit = SimpleDeposit::find($id);
        $deposit->update([
            'status' => 'Completed'
        ]);
        toastr()->warning('Status Updated!');
        return back();
    }
}
