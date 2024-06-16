
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon indigo"><i class="zmdi zmdi-account-o"></i></div>
                <h4 class="mt-3">PKR {{$user->balance}}</h4>
                <span class="text-muted">{{$user->name}}</span>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        @if($left)
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon orange"><i class="zmdi zmdi-account"></i></div>
                <h4 class="mt-3">PKR {{@$left->balance}}</h4>
                <a href="#" style="color:orange;" onclick="getTree('{{@$left->id}}')" > 
                    <strong>{{@$left->name}}</strong>
                </a>
            </div>
        </div>
        @endif
    </div>
    <div class="col-6">
        @if($right)
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon green"><i class="zmdi zmdi-account-circle"></i></div>
                <h4 class="mt-3">PKR {{@$right->balance}}</h4>
                <a href="#" style="color:green;" onclick="getTree('{{@$right->id}}')" > 
                    <strong>{{@$right->name}}</strong>
                </a>
           </div>
        </div>
        @endif
    </div>
</div>
<div class="row clearfix">
    <div class="col-3">
        @if($left && $left->left_refferal_package_1)
        <div class="card w_data_1">
           <div class="body">
                <a href="#" style="color:cyan;" data-toggle="tooltip" data-placement="top" title="{{@$left->refer_by_name(@$left->left_refferal_package_1)}}" onclick="getTree('{{@$left->left_refferal_package_1}}')" > 
                    <i class="zmdi zmdi-account-o"></i>
                </a>
           </div>
        </div>
        @endif
    </div>
    <div class="col-3">
        @if($left && $left->right_refferal_package_1)
        <div class="card w_data_1">
           <div class="body">
                {{-- <div class="w_icon dark"><i class="zmdi zmdi-users"></i></div> --}}
                <a href="#" style="color:black;" data-toggle="tooltip" data-placement="top" title="{{@$left->refer_by_name(@$left->right_refferal_package_1)}}" onclick="getTree('{{@$left->right_refferal_package_1}}')" > 
                    <i class="zmdi zmdi-account-o"></i>
                </a>
           </div>
        </div>
        @endif
    </div>
    <div class="col-3">
        @if($right && $right->left_refferal_package_1)
        <div class="card w_data_1">
           <div class="body">
                {{-- <div class="w_icon blue"><i class="zmdi zmdi-users"></i></div> --}}
                <a href="#" style="color:blue;" data-toggle="tooltip" data-placement="top" title="{{@$right->refer_by_name(@$right->left_refferal_package_1)}}"  onclick="getTree('{{@$right->left_refferal_package_1}}')" > 
                    <i class="zmdi zmdi-account-o"></i>
                </a>
           </div>
        </div>
        @endif
    </div>
    <div class="col-3">
        @if($right && $right->right_refferal_package_1)
        <div class="card w_data_1">
           <div class="body">
                {{-- <div class="w_icon pink"><i class="zmdi zmdi-users"></i></div> --}}
                <a href="#" style="color:pink;" data-toggle="tooltip" data-placement="top" title="{{@$right->refer_by_name(@$right->right_refferal_package_1)}}"  onclick="getTree('{{@$right->right_refferal_package_1}}')" > 
                    <i class="zmdi zmdi-account-o"></i>
                </a>
           </div>
        </div>
        @endif
    </div>
</div>
