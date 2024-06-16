@extends('expert-user-panel.layout.index')
@section('title')
Edit Withdraw
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form enctype="multipart/form-data" action="{{route('user.withdraw.update',$withdraw->id)}}" class="checkout" method="post" name="checkout">
                    @method('PUT')
                    @csrf
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Payment</label>                                                 
                                <input type="text" name="payment" value="{{$withdraw->payment}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Name</label>                                                 
                                <input type="text" name="name" value="{{$withdraw->name}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Withdraw Account</label>                                                 
                                <input type="text" name="account" value="{{$withdraw->account}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Payment Method</label>                                                 
                                <select class="form-control show-tick ms search-select" name="method" data-placeholder="Select">
                                    <option value="">Select a Payment Method</option>
                                    @foreach(App\Models\Source::all() as $source)
                                        <option @if($source->name == $withdraw->method) selected @endif value="{{$source->name}}">{{$source->name}}</option>
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
@endsection