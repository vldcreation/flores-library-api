
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:49 GMT -->
<head>
    <title>{{config('app.name')}} - Signup</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
                <div class="text-left ml-1"> 
                    <a href="{{route('auth.login')}}" style="color: #04a9f5;"> 
                    <i class="fas fa-arrow-alt-circle-left" style="font-size:30px;"></i>
                    </a>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-mail auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Change Password</h3>
                    <span id="validation-credential" class="text-danger error-text medium credential-error"></span>
                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                        
                    </div>
                    <form id="request-new-password-form" action="{{route('auth.validasi-token-reset-password',['email'=>$data['email'],'token'=>$data['token']])}}" method="POST">
                        <input type="hidden" name="email" value="{{$data['email']}}">
                        <div class="input-group text-left">
                            <label for="password">Password : </label>
                        </div>
                        <div class="input-group mb-6">
                            <input type="password" name="password" class="form-control" placeholder="Password Baru...">
                        </div>
                        <div class="input-group mb-3">
                            <label id="validation-password-error" class="text-danger error-text medium password-error" ></label>
                        </div>
                        <div class="input-group mt-3 text-left">
                            <label for="Cpassword">Konfirmasi Password : </label>
                        </div>
                        <div class="input-group mb-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password...">
                        </div>
                        <div class="input-group mb-3">
                            <label id="validation-password_confirmation-error" class="text-danger error-text medium password_confirmation-error" ></label>
                        </div>
                        <button id="btn-submit" type="submit" class="btn btn-primary mb-4 shadow-2">Change Password</button>
                        <button id="btn-spinner" class="btn btn-primary shasow-2 mb-4" type="button" disabled="">
                            <span class="spinner-border spinner-border-sm" role="status"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('assets/js/temp/jquery-3.6.0.min.js') }}"></script>
    <script src="{{asset('assets/js/temp/form-validate.js') }}"></script>

</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:49 GMT -->
</html>