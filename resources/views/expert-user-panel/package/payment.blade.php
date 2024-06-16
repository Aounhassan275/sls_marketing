@extends('expert-user-panel.layout.index')
@section('title')
Select Payment Method
@endsection
@section('content')
<div class="row clearfix">
    @foreach (App\Models\Payment::all() as $payment)
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card mcard_1">
            <div class="img">
                <img src="{{asset('expert-user-panel-template/assets/images/image-gallery/2.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="body">
                <div class="user">
                    <img src="{{asset('expert-user-panel-template/assets/images/sm/avatar1.jpg')}}" class="rounded-circle img-raised" alt="profile-image">
                    <h5 class="mt-3 mb-1">{{$payment->method}}</h5>
                    {{-- <span></span>                                 --}}
                </div>
                <a href="{{route('user.deposits.index',[$payment->id,$package])}}" class="btn btn-primary">Choose</a>
                <div class="d-flex bd-highlight text-center mt-4">
                    <div class="flex-fill bd-highlight">
                        <h5 class="mb-0">{{$payment->name}}</h5>
                        <small>Account Holder</small>
                    </div>
                    <div class="flex-fill bd-highlight">
                        <h5 class="mb-0">{{$payment->number}}</h5>
                        <small>Account Number</small>
                    </div>
                    {{-- <div class="flex-fill bd-highlight">
                        <h5 class="mb-0">321</h5>
                        <small>Following</small>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
