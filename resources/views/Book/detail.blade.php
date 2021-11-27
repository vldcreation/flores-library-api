<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/extra-pages/landingpage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:36 GMT -->
<head>
    <meta charset="utf-8">
    <title>Detail - </title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page template for creative dashboard">
    <meta name="keywords" content="Landing page template">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/page/assets/logos/favicon.ico') }}" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/page/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/animate.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/owl.theme.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/magnific-popup.css') }}">
    <!-- Full Page Animation -->
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/animsition.min.css') }}">
    <!-- Ionic Icons -->
    <link rel="stylesheet" href="{{ asset('assets/page/assets/css/ionicons.min.css') }}">
    <!-- Main Style css -->
    <link href="{{ asset('assets/page/assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
        <div class="main" id="main">
            <!-- Main Section-->
            <div class="hero-section app-hero">
                <div class="container">
            <!-- [Start] -->
            <div class="flex-features" id="features">
                <div class="container">
                    <div class="flex-split">
                        <div class="f-left wow fadeInUp" data-wow-delay="0s">
                            <div class="left-content">
                                <img class="img-fluid" src="{{route('getimg',strlen($books['gambar_buku'])>0 ? $books['gambar_buku'] : 'default.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="f-right wow fadeInUp" data-wow-delay="0.2s">
                            <div class="right-content">
                                <h2>{{$books['judul']}}</h2>
                                <p>
                                    {{$books['deskripsi']}}
                                </p>
                                <ul>
                                    <li><i class="fas fa-at"></i><b>{{$books['penulis']}}</b></li>
                                </ul>
                                @if(Str::length($books['file_buku']) > 0)
                                    <a target="_blank" href="{{route('getbook',$books['file_buku'])}}" class="btn btn-primary btn-action btn-fill">Download E-Book</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [End] -->
            <!-- Scroll To Top -->
            <a id="back-top" class="back-to-top page-scroll" href="#main">
                <i class="ion-ios-arrow-thin-up"></i>
            </a>
            <!-- Scroll To Top Ends-->
        </div>
        <!-- Main Section -->
    </div>
    <!-- Wrapper-->

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="{{ asset('assets/page/assets/js/jquery-2.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/page/assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/page/assets/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/page/assets/js/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/page/assets/js/custom.js') }}"></script>
</body>


<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/extra-pages/landingpage/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:49 GMT -->
</html>
