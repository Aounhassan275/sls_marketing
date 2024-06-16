@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW USER | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View User Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:auto;">#</th>
                        <th style="width:auto;">User Name</th>
                        <th style="width:auto;">User Email </th>
                        <th style="width:auto;">User Balance </th>
                        <th style="width:auto;">Total Active Users </th>
                        <th style="width:auto;">User Refer By </th>
                        <th style="width:auto;">User Placement </th>
                        <th style="width:auto;">Order Purchase </th>
                        <th style="width:auto;">Stock Purchase </th>
                        <th style="width:auto;">Leader </th>
                        <th style="width:auto;">User Package </th>
                        <th style="width:auto;">Package Date</th>
                        <th style="width:auto;">Status</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\User::all() as $key => $user)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->balance}}</td>
                        <td>{{$user->refers->count()}}</td>
                        <td>{{$user->refer_by_name($user->refer_by)}}</td>
                        <td>{{$user->placement()}}</td>
                        <td>{{$user->orders->sum('price')}}</td>
                        <td>{{$user->orders()->where('is_stock',1)->sum('price')}}</td>
                        <td>
                            @if($user->is_leader) <span class="badge badge-success">Yes</span> 
                            @else <span class="badge badge-danger">No</span> 
                            @endif
                        </td>
                        @if ($user->package)
                        <td>{{$user->package->name}}</td>    
                        <td>{{$user->a_date->format('d M,Y')}}</td>
                        @else
                        <td></td>
                        <td></td>
                        @endif
                        <td>
                            @if ($user->checkstatus() =='old')
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Pending</span>                                                      
                            @endif
                        </td>
                        <td> <a href="{{route('admin.user.detail',$user->id)}}" class="button"><button class="btn btn-primary"> Detail</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            responsive: true,
            lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection