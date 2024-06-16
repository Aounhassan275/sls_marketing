@extends('expert-user-panel.layout.index')
@section('title')
Indirect Earning
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Indirect Earnings</strong> </h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Date</th>
                                <th>Due To</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr> 
                                <td ></td>
                                <td ></td>
                                <td >Total Direct Income:</td>
                                <td >PKR {{Auth::user()->earnings()->where('type','indirect_income')->sum('price')}}</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach (Auth::user()->earnings()->where('type','indirect_income')->orderBy('created_at','DESC')->get() as $key => $earning)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td >{{$earning->created_at->format('M d,Y h:i A')}}</td>
                                    <td >{{$earning->due->name}}</td>
                                    <td >PKR {{$earning->price}}</td>
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