
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
                    <h3 class="mb-4">Reset Password</h3>
                    <form id="reset-password-form" action="{{route('auth.validasi-reset-password']}}" method="POST">
                        <div class="input-group mb-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <label id="validation-password-error" class="text-danger error-text medium password-error" ></label>
                        </div>
                        <button id="btn-submit-rp" type="submit" class="btn btn-primary mb-4 shadow-2">Reset Password</button>
                        <button id="btn-spinner-rp" class="btn btn-primary shasow-2 mb-4" type="button" disabled="">
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