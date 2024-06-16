@extends('expert-user-panel.layout.index')
@section('title')
Create Order on Product {{$product->name}}
@endsection

@section('content')
<div class="row clearfix">
    
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0">PKR {{Auth::user()->balance}}</h3>
                <p class="text-muted">User Balance</p>
                <div class="progress">
                    <div class="progress-bar l-pink" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="body">
                <h3 class="mt-0 mb-0">PKR {{Auth::user()->pending_amount}}</h3>
                <p class="text-muted">Package Pending Amount</p>
                <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <form enctype="multipart/form-data" action="{{route('user.order.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="status" value="In Process">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Name</label>                                                 
                                <input type="text" name="name" readonly value="{{Auth::user()->name}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Phone</label>                                                 
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Order Type</label>   
                                <br>
                                @if(Auth::user()->pending_amount > 0 && !$product->from_balance)
                                @if($product->price < Auth::user()->pending_amount)
                                    <input type="radio" name="order_type" value="1" checked required> Package Purchase Amount                                            
                                @else
                                    <input type="radio" name="order_type" value="3" checked required> Both Balance and Pending Amount  
                                @endif
                                @else 
                                <input type="radio" name="order_type" checked value="2" required> Balance                                            
                                @endif
                            </div>
                        </div>
                        @if($product->is_stock)
                        <div class="col-sm-6">
                            <div class="form-group">           
                                <label for="">Qty</label>                                                 
                                <input type="text" name="quantity" id="quantity" class="form-control" value="1" placeholder=""/>
                                <input type="hidden" name="is_stock" id="is_stock" class="form-control" value="1" placeholder=""/>
                            </div>
                        </div>
                        @else 
                        <input type="hidden" name="quantity"  class="form-control" value="1" placeholder=""/>
                        @endif
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Price</label>                                                 
                                <input type="text" name="price" id="price" readonly value="{{@$product->price}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Delivery Charges</label>                                                 
                                <input type="text" name="delivery_cost" id="delivery_cost" readonly value="{{@$product->delivery_charges}}" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">           
                                <label for="">Delivery Address</label>                                                 
                                <input type="text" name="address" value="" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group text-right">     
                                <button class="btn btn-primary" type="submit">Create Order</button>      
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#quantity').change(function () {
        var qty = $('#quantity').val();
        var price = "{{$product->price}}";
        $('#price').val(qty * price);
    });
</script>
@endsection