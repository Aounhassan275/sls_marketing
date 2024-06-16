<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
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
    public function index($payment, $package)
    {
     //
    }
    public function deposit($payment, $package)
    {
        $package= Package::find($package);
        $payment= Payment::find($payment);

        return view($this->directory.'.deposit.index')
            ->with('payment',$payment)
            ->with('package',$package);
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
        $user= User::find(Auth::user()->refer_by);
        $package= Package::find($request->package_id);
            $validator = Validator::make($request->all(),[
                't_id' => 'required|unique:deposits'
            ]);

            if($validator->fails()){
                toastr()->error('Transaction Id already exists');
                return redirect()->back();
            }

        Deposit::create([
            'user_id' => Auth::user()->id
        ]+$request->all());

        $user = Auth::user();
        $user->update([
            'status' => 'onHold'
        ]);

        toastr()->success('Your Deposit Request Has Been successfully Submitted.Please Wait 24 Hour For Activation.');
        
        return redirect(route('user.dashboard.index'));
    }
    public function directDeposit($id)
    {
        if(Auth::user()->balance <= 0)
        {
            toastr()->error('Insufficiant Balance.');
            return redirect(route('user.dashboard.index'));
        }
        $user= User::find(Auth::user()->id);
        $package= Package::find($id);
        // $payment= Payment::find(1);
        $deposit = Deposit::create([
            'user_id' => Auth::user()->id,
            't_id' => uniqid(),
            'payment' => 'Own Balance',
            'package_id' => $package->id,
            'amount' => $package->price,
        ]);
        if($user->a_date)
        {
            $this->upgrade($deposit->id);
        }else{
           $this->active($deposit->id);
        }
        Auth::user()->update([
            'balance' => $user->balance -= $package->price,    
        ]);
        toastr()->success('Your Package Active Successfully.');
        return redirect(route('user.dashboard.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
