@extends('expert-user-panel.layout.index')
@section('title')
Deposit in {{$payment->method}}
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form enctype="multipart/form-data" action="{{route('user.deposit.store')}}" method="post" >
                @csrf
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                    <input type="hidden" name="payment" value="{{$payment->method}}">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Trancation ID#</label>                         
                                <input type="text" class="form-control" name="t_id" placeholder="Trancation ID#" required/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Amount To Pay</label>                                                 
                                <input type="text" readonly name="amount" value="{{$package->price}}" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Transcation Screenshot</label>                                                 
                                <input type="file" name="image" class="form-control" placeholder="" required />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group text-right">     
                                <button class="btn btn-primary" type="submit">Deposit</button>      
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection