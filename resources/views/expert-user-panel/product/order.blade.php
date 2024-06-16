@extends('expert-user-panel.layout.index')
@section('title')
Orders
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Orders</strong> </h2>
               
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form method="GET" class="form-inline">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Start Date</label>
                            <input type="date" name="from" class="form-control" value="{{request()->get('from',date('m/d/Y', strtotime(@$data['default_from'])))}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>End Date</label>
                            <input type="date" name="to" value="{{request()->get('to',date('m/d/Y', strtotime(@$data['default_to'])))}}" class="form-control" >
                        </div>
                        <div class="form-group col-md-2">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Product Delivery Cost</th>
                                <th>Product Price</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr> 
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td >Total Orders Amount:</td>
                                <td >PKR {{$orders->sum('price') }}</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$order->product->name}}</td>
                                    <td >{{$order->quantity}}</td>
                                    <td >{{$order->phone}}</td>
                                    <td >{{$order->address}}</td>
                                    <td >{{$order->status}}</td>
                                    <td >{{$order->created_at->format('M d,Y h:i A')}}</td>
                                    <td >PKR {{$order->delivery_cost}}</td>
                                    <td >PKR {{$order->price}}</td>
                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection