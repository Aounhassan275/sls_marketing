<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title> User Panel | {{App\Models\Setting::siteName()}}</title>
<link rel="icon" href="{{asset('expert-user-panel-template/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/charts-c3/plugin.css')}}"/>

<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/morrisjs/morris.min.css')}}" />

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/css/style.min.css')}}">
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/select2/select2.css')}}" />


@toastr_css
@yield('css')
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('expert-user-panel-template/assets/images/loader.svg')}}" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        @if (Auth::user()->checkstatus() =='old')
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Ecommerce Section</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="{{route('user.product.index')}}">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-camera"></i></div>
                                <p class="mb-0">Products</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.order.index')}}">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-tag"></i></div>
                                <p class="mb-0">Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif
        <li><a href="{{route('user.user.index')}}" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>   
        <li><a href="{{route('user.logout')}}" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{url('/')}}"><img src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">{{App\Models\Setting::siteName()}}</span></a>
    </div>
    <div class="menu">
        
        <ul class="list">
            <li>
                <div class="user-info">
                    @if(Auth::user()->image)
                    <a class="image" href="{{route('user.user.index')}}"><img src="{{asset(Auth::user()->image)}}" alt="User"></a>
                    @else 
                    <a class="image" href="{{route('user.user.index')}}"><img src="{{asset('expert-user-panel-template/assets/images/profile_av.jpg')}}" alt="User"></a>
                    @endif
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                        <small>{{Auth::user()->role? Auth::user()->role : 'User'}} Panel</small>                        
                    </div>
                </div>
            </li>
            <li><a href="{{route('user.dashboard.index')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @if (Auth::user()->checkstatus() =='old')
            <li><a href="{{route('user.package.index')}}"><i class="zmdi zmdi-account"></i><span>Packages</span></a></li>
            <li><a href="{{route('user.simple-deposit.index')}}"><i class="zmdi zmdi-account"></i><span>Deposit</span></a></li>
            <li><a href="{{route('user.refer.index')}}"><i class="zmdi zmdi-account"></i><span>Refferral</span></a></li>
            <li ><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Withdraw</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('user.withdraw.create')}}">Create Withdraw</a></li>
                    <li><a href="{{route('user.withdraw.index')}}">Manage Withdraw</a></li>                 
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Earnings</span></a>
                <ul class="ml-menu">
                    <li><a href="{{url('user/direct_earning')}}">Direct</a></li>
                    <li><a href="{{url('user/indirect_earning')}}">In-Direct</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>AutoPool</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('user.autopool.package_1')}}">Package 1</a></li>
                    <li><a href="{{route('user.autopool.package_2')}}">Package 2</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Ecommerce Section</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('user.product.index')}}">Products</a></li>
                    <li><a href="{{route('user.order.index')}}">Orders</a></li>
                </ul>
            </li>
            @elseif (Auth::user()->checkstatus() =='fresh' && Auth::user()->status=='pending')
                <li><a href="{{route('user.package.index')}}"><i class="zmdi zmdi-account"></i><span>Packages</span></a></li>
            @endif 
            <li><a href="{{route('user.logout')}}"><i class="zmdi zmdi-power"></i><span>Logout</span></a></li>
        </ul>
    </div>
</aside>

<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>@yield('title')</h2>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @yield('content')
    </div>
</section>


<!-- Jquery Core Js --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('expert-user-panel-template/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{asset('expert-user-panel-template/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/js/pages/index.js')}}"></script>
<!-- Jquery DataTable Plugin Js --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{asset('expert-user-panel-template/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
@yield('scripts')
@toastr_js
@toastr_render
</body>
</html>