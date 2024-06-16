<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title> User Panel | {{App\Models\Setting::siteName()}}</title>
    @yield('meta')
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
    <link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/morrisjs/morris.css')}}" />
    <!-- Favicon-->
    <link rel="icon" href="{{asset('expert-user-panel-template/favicon.ico')}}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
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
                    <a class="image" href="{{route('user.user.index')}}"><img src="{{asset('expert-user-panel-template/assets/images/profile_av.jpg')}}" alt="User"></a>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                        <small>User Panel</small>                        
                    </div>
                </div>
            </li>
            <li><a href="{{route('user.dashboard.index')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @if (Auth::user()->checkstatus() =='old')
            <li><a href="{{route('user.package.index')}}"><i class="zmdi zmdi-account"></i><span>Packages</span></a></li>
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
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>E-Commerce Section</span></a>
                <ul class="ml-menu">
                    <li><a href="{{route('user.product.index')}}">Products</a></li>
                    <li><a href="{{route('user.order.index')}}">Orders</a></li>
                </ul>
            </li>
            @elseif (Auth::user()->checkstatus() =='fresh' && Auth::user()->status=='pending')
                <li><a href="{{route('user.package.index')}}"><i class="zmdi zmdi-account"></i><span>Packages</span></a></li>
            @endif
            <li><a href="{{route('user.user.index')}}"><i class="zmdi zmdi-account"></i><span>Profile</span></a></li>
            <li><a href="{{route('user.logout')}}"><i class="zmdi zmdi-account"></i><span>Logout</span></a></li>
        </ul>
    </div>
</aside>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
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
    </div>
</section>

<script src="{{asset('expert-user-panel-template/assets/plugins/dropzone/dropzone.js')}}"></script> <!-- Dropzone Plugin Js --> 
<!-- Jquery Core Js --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{asset('expert-user-panel-template/assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('expert-user-panel-template/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/js/pages/ecommerce.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/js/pages/charts/jquery-knob.min.js')}}"></script>


<!-- Jquery DataTable Plugin Js --> 
<script src="{{asset('expert-user-panel-template/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{asset('expert-user-panel-template/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
<script src="{{asset('expert-user-panel-template/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
@toastr_js
@toastr_render
</body>
</html>