@extends('expert-user-panel.layout.index')
@section('title')
Auto Pool For Package PKR 40000
@endsection
@section('content')
<div id="user-tree"></div>

@if(Auth::user()->package && Auth::user()->package->package_level_rewards->where('type',2)->count() > 0)
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Level</strong> Progress</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-hover c_table">
                    <thead>
                        <tr>
                            <th class="text-center">Level</th>
                            <th class="text-center">Total Users Allowed</th>
                            <th class="text-center">Total Users Exist</th>
                            <th class="text-center">Reward</th>
                            <th class="text-center">Reward Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->package->package_level_rewards()->where('type',3)->get() as $key => $reward)
                        <tr>
                            @php 
                            $index = $key+1;
                            @endphp
                            <td class="text-center">Level {{$index}}</td>
                            <td class="text-center">{{config('services.levels.'.$index)}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::getLevelStatus($index,Auth::user()))}}</td>
                            <td class="text-center">
                                @if(config('services.levels.'.$index) == count(App\Helpers\AutoPoolForPackage2::getLevelStatus($index,Auth::user())))
                                    <span class="badge badge-success">{{$reward->title}}</span>
                                @else 
                                    <span class="badge badge-danger">{{$reward->title}}</span>
                                @endif
                            </td> 
                            <td class="text-center">
                                @if(Auth::user()->getLevelRewardStatusForAutoPoolpackage2($index))
                                    @if(Auth::user()->getLevelRewardStatusForAutoPoolpackage2($index)->status)
                                        <span class="badge badge-success">{{Auth::user()->getLevelRewardStatusForAutoPoolpackage2($index)->name}}</span>
                                    @else
                                        <span class="badge badge-danger">{{Auth::user()->getLevelRewardStatusForAutoPoolpackage2($index)->name}}</span>
                                    @endif
                                @else 
                                    @if($reward->title == 'NIL' && config('services.levels.'.$index) == count(App\Helpers\AutoPoolForPackage2::getLevelStatus($index,Auth::user())))
                                        <span class="badge badge-success">{{$reward->title}}</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@else
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Level</strong> Progress</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-hover c_table">
                    <thead>
                        <tr>
                            <th class="text-center">Level</th>
                            <th class="text-center">Total Users Allowed</th>
                            <th class="text-center">Total Users Exist</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Level 1</td>
                            <td class="text-center">{{config('services.levels.1')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel1(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 2</td>
                            <td  class="text-center">{{config('services.levels.2')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel2(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 3</td>
                            <td  class="text-center">{{config('services.levels.3')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel3(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 4</td>
                            <td  class="text-center">{{config('services.levels.4')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel4(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 5</td>
                            <td  class="text-center">{{config('services.levels.5')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel5(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 6</td>
                            <td  class="text-center">{{config('services.levels.6')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel6(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 7</td>
                            <td  class="text-center">{{config('services.levels.7')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel7(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 8</td>
                            <td  class="text-center">{{config('services.levels.8')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel8(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 9</td>
                            <td  class="text-center">{{config('services.levels.9')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel9(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 10</td>
                            <td  class="text-center">{{config('services.levels.10')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel10(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 11</td>
                            <td  class="text-center">{{config('services.levels.11')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel11(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 12</td>
                            <td  class="text-center">{{config('services.levels.12')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel12(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 13</td>
                            <td  class="text-center">{{config('services.levels.13')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel13(Auth::user()))}}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">Level 14</td>
                            <td  class="text-center">{{config('services.levels.14')}}</td>
                            <td class="text-center">{{count(App\Helpers\AutoPoolForPackage2::autoPoolLevel14(Auth::user()))}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
@endif
@endsection

@section('scripts')
<script>
    var user_id = 1;
    getTree(user_id);
    function getTree(user_id)
    {  
        $.ajax({
            url: "{{route('user.refer.getPackage2Tree')}}",
            method: 'post',
            data: {
                id: user_id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response){
                $('#user-tree').html(response.html)
            }
        });
    }
</script>
@endsection