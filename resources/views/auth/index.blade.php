
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
            <form id="login-form" action="{{route('auth.validasi')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Sign in</h3>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <span id="validation-credential" class="text-danger error-text medium credential-error"></span>
                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                        
                    </div>
                    <div class="input-group mb-6">
                        <input type="text" class="form-control" aria-invalid="false" name="username" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <label id="validation-username-error" class="text-danger error-text medium username-error" ></label>
                    </div>
                    <div class="input-group md-6">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="input-group mb-3">
                        <label id="validation-password-error" class="text-danger error-text medium password-error" ></label>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                            <label for="checkbox-fill-2" class="cr">Remember me</label>
                        </div>
                    </div>
                    <button id="btn-submit" type="submit" class="btn btn-primary shadow-2 mb-4">Sign in</button>
                    <button id="btn-spinner" class="btn btn-primary shasow-2 mb-4" type="button" disabled="">
                        <span class="spinner-border spinner-border-sm" role="status"></span>
                        Loading...
                    </button>
                    <p class="mb-0 text-muted"><a href="{{route('auth.form-reset-password')}}"> Forgot Password ?</a></p>
                </div>
            </div>
            </form>
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
