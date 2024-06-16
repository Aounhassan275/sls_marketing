<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title> Sign Up | {{App\Models\Setting::siteName()}}</title>
<!-- Favicon-->
<link rel="icon" href="{{asset('expert-user-panel-template/favicon.ico')}}" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('expert-user-panel-template/assets/css/style.min.css')}}">
<style>
    .error_message{
        color:red;
    }
    .success_message{
        color:green;
    }
</style>    
@toastr_css
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" enctype="multipart/form-data"  method="POST" action="{{route('user.register')}}" >
                    @csrf
                    <div class="header">
                        <img class="logo" src="{{asset('expert-user-panel-template/assets/images/logo.svg')}}" alt="">
                        <h5>Sign Up</h5>
                        @if(@$user)
                            <p>Refer By : {{@$user->name}}</p>                                
                        @endif
                    </div>
                    <div class="body">
                        <input type="hidden" value="{{$code ?? ''}}" name="code">
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Username" required value="{{old('name')}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required value="{{old('email')}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="phone" class="form-control" placeholder="Phone" required value="{{old('phone')}}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-phone-locked"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" placeholder="Phone" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-phone-locked"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="pwd" minlength="4" onkeyup="validatePassword(this.value);" value="{{old('password')}}"  type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>    
                        </div>
                        <span id="msg"></span>                     
                        <div class="input-group mb-3">
                            <input id="confirmpwd" onkeyup="confirmPassword(this.value);" minlength="4" value="{{old('confirm_password')}}" type="password" class="form-control" name="confirm_password" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>        
                        </div>
                        <span id="confirmmsg"></span>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
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
<script>
    function validatePassword(password) {
        
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("msg").innerHTML = "";
            return;
        }
        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]");      // Uppercase Alpabates
        matchedCase.push("[0-9]");      // Numbers
        matchedCase.push("[a-z]");     // Lowercase Alphabates

        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }
        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Very Weak";
                color = "red";
                break;
            case 3:
                strength = "Medium";
                color = "orange";
                break;
            case 4:
                strength = "Strong";
                color = "green";
                break;
        }
        document.getElementById("msg").innerHTML = strength;
        document.getElementById("msg").style.color = color;
    }
    function confirmPassword(password) {
        
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("confirmmsg").innerHTML = "";
            return;
        }
        // new_password = document.getElementById("pwd").val();
        new_password =  $('#pwd').val();
        if(new_password == password)
        {
            var strength = "Password Matched";
            var color = "green";
        }else{
            var strength = "Password dont Matched";
            var color = "red";
        }

        document.getElementById("confirmmsg").innerHTML = strength;
        document.getElementById("confirmmsg").style.color = color;
    }
    
</script>
</body>
</html>