@extends('expert-user-panel.layout.index')
@section('title')
Deposits
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Deposits</strong> </h2>
                <a href="{{route('user.simple-deposit.create')}}" class="btn btn-primary">Create Balance Deposit</a>
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
                                <th>Method</th>
                                <th>Transcation ID#</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->simpleDeposits()->get() as $key => $deposit)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$deposit->payment}}</td>
                                    <td>{{$deposit->t_id}}</td>
                                    <td>PKR {{$deposit->amount}}</td>
                                    <td> @if($deposit->status=="Completed")
                                        <span class="badge badge-success">{{$deposit->status}}</span>
                                        @elseif($deposit->status=="Rejected")
                                        <span class="badge badge-warning">{{$deposit->status}}</span>
                                        @else
                                        <span class="badge badge-danger">{{$deposit->status}}</span>
                                        @endif
                                    </td>
                                    <td >{{$deposit->created_at->format('M d,Y h:i A')}}</td>
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