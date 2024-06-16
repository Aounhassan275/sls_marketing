@extends('expert-user-panel.layout.index')
@section('title')
Create Deposit For Balance
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form enctype="multipart/form-data" action="{{route('user.simple-deposit.store')}}" method="post" >
                @csrf
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Payment Method</label>                                            
                                <select class="form-control show-tick ms search-select" name="payment" required data-placeholder="Select">
                                    <option value="">Select a Payment Method</option>
                                    @foreach (App\Models\Payment::all() as $payment)
                                        <option value="{{$payment->method}}">{{$payment->method}}</option>
                                    @endforeach
                                </select>                     
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Trancation ID#</label>                         
                                <input type="text" class="form-control" name="t_id" placeholder="Trancation ID#" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Amount To Pay</label>                                                 
                                <input type="text"  name="amount" value="" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
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