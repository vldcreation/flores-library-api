<?php use App\Http\Resources\Helper; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1629436,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Favicon icon -->
    <link rel="icon" href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- notification css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/notification/css/notification.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/css/datatables.min.css') }}">
    <!-- material datetimepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <!-- Bootstrap datetimepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material/css/materialdesignicons.min.css') }}">
    <!-- [Scroll Icon] start -->
    <style>
        .scroll-to-top {
            position: fixed;
            bottom: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            color: #ffffff;
            font-size: 18px;
            text-transform: uppercase;
            line-height: 40px;
            text-align: center;
            z-index: 100;
            cursor: pointer;
            background: #3f4d67;
            display: none;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }
    </style>
    <!-- [Scroll Icon] end -->

    

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    @if(isset($nav) && $nav == 'loan')
        @include('partials.nav.nav-loan')
    @else
        @include('partials.nav.nav-admin')
    @endif
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
        @include('partials.head.header')
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        @yield('main-content')
    </div>
    <!-- [ Main Content ] end -->

    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="../assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="../assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="../assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="../assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="../assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <div class="scroll-to-top scroll-to-target" data-target="html" style="display: none;"><span class="fa fa-angle-double-up"></span></div>
    <!-- [Scroll to Top Event] start -->
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() < 100) {
                $('.scroll-to-target').fadeOut();
            } else {
                $('.scroll-to-target').fadeIn();
            }
        });
        if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1500);
	
		});
	}
    </script>
    <!-- [Scroll to Top Event] end -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/menu-setting.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <!-- amchart js -->
    <script src="{{ asset('assets/plugins/amchart/js/amcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/gauge.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/serial.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/light.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/pie.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/ammap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/usaLow.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/radar.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/worldLow.js') }}"></script>
    <!-- notification Js -->
    <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tbl-datatable-custom.js') }}"></script>

    <!-- dashboard-custom js -->
    <script src="{{ asset('assets/js/pages/dashboard-custom.js') }}"></script>

    <!-- sweet alert Js -->
    <script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ac-alert.js') }}"></script>
    
    <!-- Input Mask Js -->
    <script src="{{ asset('assets/plugins/inputmask/js/inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/js/autoNumeric.js') }}"></script>
    
    <!-- form picker custome JS -->
    <script src="{{ asset('assets/js/pages/form-masking-custom.js') }}"></script>
    
    <!-- material datetimepicker Js -->
    <script src="{{ asset('assets/js/downloads/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    
    <!-- Manually js -->
    <script src="{{ asset('assets/js/temp/app.js') }}"></script>
</body>

</html>
