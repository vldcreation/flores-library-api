
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-subscribe.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:51 GMT -->
<head>
    <title>{{config('app.name')}} - Settings</title>
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
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .img-path>img{
            height: 50vh;
        }
    </style>

</head>

<body>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('admin.index')}}" style="position: relative;" class="btn btn-sm btn-primary"> <i class="fas fa-arrow-left"></i> Home</a>
            </div>
        </div>
    <div class="auth-wrapper">
        <div class="auth-content subscribe">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="img-path">
                    <img class="card-img-top" src="{{ route('getimg',$floresProfile->path_image) }}" alt="Card image cap">
                </div>
                <div class="card-body text-left">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h5 class="card-title"> {{$floresProfile->judul}} </h5>
                            <p class="card-text"> {{$floresProfile->content}} </p>
                            <a href="{{route('admin.settings.edit')}}" style="color: #fff;" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-subscribe.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:51 GMT -->
</html>
