@extends('expert-user-panel.layout.index')
@section('title')
Packages
@endsection
@section('content')
<div class="row clearfix">
    @foreach ($packages as $package)
    <div class="col-lg-4">
        <div class="card pricing pricing-item">
            <div class="pricing-deco l-blue">
                <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                    <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                    <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                    <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                    <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                </svg>
                <div class="pricing-price"><span class="pricing-currency">PKR</span>{{$package->price}}
                </div>
                <h3 class="pricing-title">{{$package->name}}</h3>
            </div>
            <div class="body">
                <ul class="feature-list list-unstyled">
                    <li>Direct Income is PKR {{$package->direct_income}}</li>
                    {{-- <li>In-direct Income is PKR {{$package->indirect_income}} </li> --}}
                    {{-- <li>Withdraw Limit is PKR {{$package->withdraw_limit}}</li> --}}
                    {{-- <li>Income Limit is PKR {{$package->income_limit}}</li> --}}
                    <li>
                        @if(Auth::user()->package_id && Auth::user()->checkStatus() == 'old')
                            @if(Auth::user()->package_id == $package->id)
                                <button class="btn btn-success">Already Purchased</button>
                            @elseif($purchased_package && $purchased_package->id == $package->id)
                            
                                <a href="{{route('user.package.payment',$package->id)}}" class="btn btn-primary">Choose Plan</a>
                            @else 
                                <button class="btn btn-info">Not Allowed To Purchased</button>
                            @endif
                        @else
                            @if($purchased_package && $purchased_package->id == $package->id)
                                <a href="{{route('user.package.payment',$package->id)}}" class="btn btn-primary">Choose Plan</a>
                            @else 
                                <button class="btn btn-info">Not Allowed To Purchased</button>
                            @endif
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection