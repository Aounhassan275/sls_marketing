@extends('expert-user-panel.layout.index')
@section('title')
Create Withdraw
@endsection
@section('content')
@if(Auth::user()->balance  >  Auth::user()->package->withdraw_limit)
{{-- @if(Auth::user()->checkWithdrawStatus() == false) --}}
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form enctype="multipart/form-data" action="{{route('user.withdraw.store')}}" method="post">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Payment</label>                                                 
                                <input type="text" name="payment" value="" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Name</label>                                                 
                                <input type="text" name="name" value="" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Account</label>                                                 
                                <input type="text" name="account" value="" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Payment Method</label>                                                 
                                <select class="form-control show-tick ms search-select" name="method" required data-placeholder="Select">
                                    <option value="">Select a Payment Method</option>
                                    @foreach(App\Models\Source::all() as $source)
                                        <option value="{{$source->name}}">{{$source->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group text-right">     
                                <button class="btn btn-primary" type="submit">Update</button>      
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @elseif(Auth::user()->checkWithdrawStatus() == true) --}}
{{-- <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body"> 
                <p>
                    Your Package Withdraw Limit is Exceeded.Upgrade Your Package to get more withdraw amount.
                </p>
            </div>
        </div>
    </div>
</div> --}}
@else
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body"> 
                <p>
                    Your Package Withdraw Limit is PKR {{Auth::user()->package->withdraw_limit}} and Your balance is PKR {{Auth::user()->balance}}.
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection