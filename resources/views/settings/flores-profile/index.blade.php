
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" href="https://codedthemes.com/demos/admin-templates/datta-able/bootstrap/assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/prism/css/prism.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .pcoded-navbar .pcoded-inner-navbar>li.active>a,
        .pcoded-navbar .pcoded-inner-navbar>li.pcoded-trigger>a {
            background: transparent;
        }

        .pcoded-navbar .pcoded-inner-navbar>li.active>a,
        .pcoded-navbar .pcoded-inner-navbar>li>a.active {
            background: #333f54;
            color: #fff;
            position: relative;
        }

        .pcoded-navbar .pcoded-inner-navbar>li.active>a,
        .pcoded-navbar .pcoded-inner-navbar>li>a.active>.pcoded-micon {
            color: #fff;
        }

        .pcoded-navbar .pcoded-inner-navbar>li>a.active:after {
            content: "";
            background-color: #1dc4e9;
            z-index: 1027;
            position: absolute;
            left: 0;
            top: 0px;
            width: 3px;
            height: 100%;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background: #04a9f5;
            box-shadow: none;
        }

        pre[class*=language-]>code {
            border-left: 5px solid #04a9f5;
        }

        .nav-pills>li i {
            display: inline-block;
            font-size: 15px;
            padding: 0px 0;
        }
        .img-path>img{
            height: 50vh;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

</head>

<body>

<div class="pcoded-warapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="row">
                    <div class="col-sm-12">
                                    <div class="card" id="filestruct">
                                        <div class="card-header">
                                            <h5>Settings</h5>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expand="false" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(45px, 45px, 0px);">
                                                        <li class="dropdown-item minimize-card"><a href="javascript:"><span><i class="feather icon-minus"></i>Collapse</span><span style="display:none"><i class="feather icon-plus"></i> Expand</span></a></li>
                                                        <li class="dropdown-item close-card"><a href="javascript:"><i class="feather icon-trash"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <a href="{{route('admin.index')}}" style="position: relative;" class="btn btn-sm btn-primary mb-0 ml-3"> <i class="fas fa-arrow-left"></i>Home</a>
                                            <ul class="nav nav-pills mb-0" id="pills-tab-struct" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link show active" id="pills-filestruct-tab" data-toggle="pill" href="#pills-page-profile" role="tab" aria-selected="true">Profile Settings</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" id="pills-pageaccount-tab" data-url="{{route('admin.settings.account')}}" data-toggle="pill" href="#pills-page-account" role="tab" aria-selected="false">Account Settings</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content mb-0 pt-2" id="pills-tabContent-struct">
                                                <div class="tab-pane show active" id="pills-page-profile" role="tabpanel" aria-labelledby="pills-filestruct-tab">
                                                    <!-- Profile Settings Here -->
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
                                                </div>
                                                <div class="tab-pane show" id="pills-page-account" role="tabpanel" aria-labelledby="pills-pageaccount-tab">
                                                    <!-- Account Settings Here -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5 class="mt-5">Form Update Profile</h5>
                                                            <hr>
                                                            <form id="update-account-form" action="{{route('admin.settings.account.update')}}" method="POST">
                                                                @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif
                                                                <span id="validation-credential" class="text-danger error-text medium credential-error"></span>
                                                                <input type="hidden" id="id" name="id" class="form-control">
                                                                <div class="form-group row">
                                                                    <label for="inputName" class="col-sm-3 col-form-label">Nama :</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="name" class="form-control" id="inputName">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-name-error" class="text-danger error-text medium name-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email :</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="email" class="form-control" id="inputEmail3">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-email-error" class="text-danger error-text medium email-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputNoTelp" class="col-sm-3 col-form-label">No Telp :</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="no_telp" class="form-control id_telephone" data-mask="(62) 999-9999-9999">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-no_telp-error" class="text-danger error-text medium no_telp-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Konfirm Password :</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Konfirmasi Password untuk update...">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-password-error" class="text-danger error-text medium password-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button id="btn-submit" type="submit" class="btn btn-primary">Update</button>
                                                                        <button id="btn-spinner" class="btn btn-primary shasow-2 mb-4" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm" role="status"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5 class="mt-5">Form Update Password</h5>
                                                            <hr>
                                                            <form id="update-password-form" action="{{route('admin.settings.password.update')}}" method="POST">
                                                                @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif
                                                                <span id="validation-credential2" class="text-danger error-text medium credential-error2"></span>
                                                                <input type="hidden" id="id" name="id" class="form-control">
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Old Password</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" name="password2" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Password saat ini...">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-password2-error" class="text-danger error-text medium password2-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Password Baru</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" name="new_password" class="form-control" id="colFormLabel" placeholder="Password Baru...">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-new_password-error" class="text-danger error-text medium new_password-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabel" class="col-sm-3 col-form-label col-form-label">Konfirmasi Password</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" name="password_confirmation" class="form-control form-control" id="colFormLabel" placeholder="Konfirmasi password...">
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <label id="validation-password_confirmation-error" class="text-danger error-text medium password_confirmation-error" ></label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button id="btn-submit2" type="submit" class="btn btn-primary">Change password</button>
                                                                        <button id="btn-spinner2" class="btn btn-primary shasow-2 mb-4" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm" role="status"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- <script src="{{asset('assets/js/temp/jquery-3.6.0.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/pcoded.min.js') }}"></script> -->
    <script src="{{ asset('assets/plugins/prism/js/prism.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            var btnSpinner = $('button#btn-spinner');
            var preSpinner = $('div.spinner-grow');
            var btnSpinner2 = $('button#btn-spinner2');
            var preSpinner2 = $('div.spinner-grow2');
            var name = $('input[name="name"]');
            var email = $('input[name="email"]');
            var no_telp = $('input[name="no_telp"]');
            var password = $('input[name="password"]');
            var password2 = $('input[name="password2"]');
            var new_password = $('input[name="new_password"]');
            var password_confirmation = $('input[name="password_confirmation"]');
            preSpinner.hide();
            btnSpinner.hide();
            preSpinner2.hide();
            btnSpinner2.hide();
            $(name).on('keyup' , function(){
                $('span.credential-error').text('');
                name.removeClass('is-invalid');
                name.attr('aria-invalid','false');
                $('label.name-error').text('');
            });
            $(email).on('keyup' , function(){
                $('span.credential-error').text('');
                email.removeClass('is-invalid');
                email.attr('aria-invalid','false');
                $('label.email-error').text('');
            });
            $(no_telp).on('keyup' , function(){
                $('span.credential-error').text('');
                no_telp.removeClass('is-invalid');
                no_telp.attr('aria-invalid','false');
                $('label.no_telp-error').text('');
            });
            $(password).on('keyup' , function(){
                $('span.credential-error').text('');
                password.removeClass('is-invalid');
                password.attr('aria-invalid','false');
                $('label.password-error').text('');
            });
            $(password2).on('keyup' , function(){
                $('span.credential-error').text('');
                password2.removeClass('is-invalid');
                password2.attr('aria-invalid','false');
                $('label.password2-error').text('');
            });
            $(new_password).on('keyup' , function(){
                $('span.credential-error').text('');
                new_password.removeClass('is-invalid');
                new_password.attr('aria-invalid','false');
                $('label.new_password-error').text('');
            });
            $(password_confirmation).on('keyup' , function(){
                $('span.credential-error').text('');
                password_confirmation.removeClass('is-invalid');
                password_confirmation.attr('aria-invalid','false');
                $('label.password_confirmation-error').text('');
            });
        });

        $('body').scrollspy({
            target: ".pcoded-inner-navbar"
        });
        $('body').scroll(function() {
            $('.nav-item').removeClass('pcoded-trigger');
        });
        $(".pcoded-inner-navbar a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1500, function() {
                    window.location.hash = hash;
                });
            }
        });

        $('#pills-pageaccount-tab').on('click', function (e) {
            e.preventDefault();
            var btnSubmit = $('button#btn-submit');
            var btnSpinner = $('button#btn-spinner');
            btnSubmit.show();
            btnSpinner.hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: $(this).attr('data-url'),
                success: function (response) {
                    // console.log(response);
                    if(response.status == 200){
                        $('input[name*=id]').val(response.data.id);
                        $('input[name*=name]').val(response.data.name);
                        $('input[name*=email]').val(response.data.email);
                        $('input[name*=no_telp]').val(response.data.no_telp);
                    }
                }
            });

        });
        $('#update-account-form').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var btnSubmit = $('button#btn-submit');
            var btnSpinner = $('button#btn-spinner');
            btnSubmit.hide();
            btnSpinner.show();
            let accountId = $('input#id').val();
            var name = $('input[name*="name"]');
            var email = $('input[name*="email"]');
            var no_telp = $('input[name*="no_telp"]');
            // console.log(data);
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType : "json",
                contentType: false,
                beforeSend :function(){
                    $(document).find('label.error-text').text('');
                },
                success: function (response) {
                    console.log(response);
                    if(response.status == 400){
                        // console.log(response);
                        $.each(response.errors , function(prefix , val){
                            // console.log(val);
                            $('label.'+prefix+'-error').text(val);
                            $('input[name="'+prefix+'"]').addClass('is-invalid');
                            $('input[name="'+prefix+'"]').attr('aria-invalid','true');
                        });
                    }
                    else if(response.status == 401){
                        $('label.password-error').text(response.error);
                        $('input[name="password"]').addClass('is-invalid');
                        $('input[name="password"]').attr('aria-invalid','true');
                    }
                    else if(response.status == 200){
                        // console.log(response);
                        let credential = $('span.credential-error'); 
                        credential.removeClass();
                        credential.text(response.message);
                        credential.attr('class','text-success');
                        $('input[name="password"]').val('');
                        // let validation = $('span#validation-credential');
                        // var preSpinner = $('div.spinner-grow');
                        // preSpinner.show();
                        // validation.removeClass();
                        // validation.text('Success reset , while you are redirected...');
                        // preSpinner.html('<span class="sr-only">Loading.</span>');
                    }
                }
            }).done(function(){
                btnSubmit.show();
                btnSpinner.hide();
            });
        });

        // Change Password
        $('#update-password-form').on('submit',function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var btnSubmit2 = $('button#btn-submit2');
            var btnSpinner2 = $('button#btn-spinner2');
            btnSubmit2.hide();
            btnSpinner2.show();
            let accountId = $('input#id').val();
            var password2 = $('input[name*="password2"]');
            var new_password = $('input[name*="new_password"]');
            var password_confirmation = $('input[name*="password_confirmation"]');
            console.log(accountId);
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType : "json",
                contentType: false,
                beforeSend :function(){
                    $(document).find('label.error-text').text('');
                },
                success: function (response) {
                    console.log(response);
                    if(response.status == 0){
                        // console.log(response);
                        $.each(response.errors , function(prefix , val){
                            // console.log(val);
                            $('label.'+prefix+'-error').text(val);
                            $('input[name="'+prefix+'"]').addClass('is-invalid');
                            $('input[name="'+prefix+'"]').attr('aria-invalid','true');
                        });
                    }
                    else if(response.status == 401){
                        $('label.password2-error').text(response.error);
                        $('input[name="password2"]').addClass('is-invalid');
                        $('input[name="password2"]').attr('aria-invalid','true');
                    }
                    else if(response.status == 200){
                        // console.log(response);
                        let credential = $('span.credential-error2'); 
                        credential.removeClass();
                        credential.text(response.message);
                        credential.attr('class','text-success');
                        $('#update-password-form')[0].reset();
                        // let validation = $('span#validation-credential');
                        // var preSpinner = $('div.spinner-grow');
                        // preSpinner.show();
                        // validation.removeClass();
                        // validation.text('Success reset , while you are redirected...');
                        // preSpinner.html('<span class="sr-only">Loading.</span>');
                    }
                }
            }).done(function(){
                btnSubmit2.show();
                btnSpinner2.hide();
            });
        });

        
    </script>
    <!-- Input Mask Js -->
    <script src="{{ asset('assets/plugins/inputmask/js/inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/js/autoNumeric.js') }}"></script>
    
    <!-- form picker custome JS -->
    <script src="{{ asset('assets/js/pages/form-masking-custom.js') }}"></script>

</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-subscribe.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:51 GMT -->
</html>
