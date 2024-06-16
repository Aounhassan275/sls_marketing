<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title> Sign In | {{App\Models\Setting::siteName()}}</title>
<!-- Favicon-->
<link rel="icon" href="{{asset('expert-user-panel-template/favicon.ico')}}" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/css/style.min.css')}}">    
@toastr_css
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="POST" action="{{route('user.login')}}">
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        {{-- <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">Remember Me</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
                        <div class="signin_with mt-3">
                            <p class="mb-0">OR</p>
                            <a href="{{url('user/register',App\Models\User::find(1)->refferral_link)}}" class="btn btn-primary  btn-block waves-effect waves-light">Sign Up</a>
                            {{-- <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button> --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{asset('expert-user-panel-template/assets/images/signin.svg')}}" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('expert-user-panel-template/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('expert-user-panel-template/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
@toastr_js
@toastr_render
</body>
</html>