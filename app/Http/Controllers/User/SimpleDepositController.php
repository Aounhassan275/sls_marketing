<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SimpleDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SimpleDepositController extends Controller
{
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->directory.'.simple-deposit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->directory.'.simple-deposit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            't_id' => 'required|unique:simple_deposits'
        ]);

        if($validator->fails()){
            toastr()->error('Transaction Id already exists');
            return redirect()->back();
        }

        SimpleDeposit::create([
            'user_id' => Auth::user()->id
        ]+$request->all());

        toastr()->success('Your Deposit Request Has Been successfully Submitted.');
        
        return redirect(route('user.dashboard.index'));
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
}
