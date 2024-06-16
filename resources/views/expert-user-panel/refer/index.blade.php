@extends('expert-user-panel.layout.index')
@section('title')
Refferrals
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group">           
                            <label for="">Copy Link For Referral</label>      
                            <input type="text" class="form-control" id="link_area"  value="{{url('user/register',Auth::user()->refferral_link)}}"  readonly>                   
                            <br>
                            <button type="button" class="copy-button btn btn-dark  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Copy to clipboard</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Refferrals</strong> </h2>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Package Name</th>
                                <th>Package Amount</th>
                                <th>Refer By</th>
                                <th>Placement</th>
                                <th>Left Referral</th>
                                <th>Right Referral</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Earning</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referrals as $key => $user)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><a href="{{url('user/refferral_detail',$user->id)}}"> {{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if($user->package)
                                        {{$user->package->name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->package)
                                        {{$user->package->price}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->refer_by)
                                        {{$user->refer_by_name($user->refer_by)}}
                                        @endif
                                    </td>
                                    <td>{{$user->placement()}}</td>
                                    <td>{{count($user->getOrginalLeft())}}</td>
                                    <td>{{count($user->getOrginalRight())}}</td>
                                    <td>{{$user->refer_type}}</td>
                                    <td>
                                        @if($user->checkstatus() =='old')
                                        <span class="badge badge-success">Active</span>    
                                        @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                        @endif</td>
                                    <td>{{$user->balance}}</td>
                    
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
@section('scripts')
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection