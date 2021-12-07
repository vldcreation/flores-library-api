
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
                                            <h5>Structure</h5>
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
                                            <a href="{{route('admin.index')}}" style="position: relative;" class="btn btn-sm btn-primary mb-0 ml-3"> <i class="fas fa-arrow-left"></i> Home</a>
                                            <ul class="nav nav-pills mb-0" id="pills-tab-struct" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link show active" id="pills-filestruct-tab" data-toggle="pill" href="#pills-filestruct" role="tab" aria-selected="true">Profile Settings</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link show" id="pills-pagestruct-tab" data-toggle="pill" href="#pills-page-struct" role="tab" aria-selected="false">Account Settings</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content mb-0 pt-2" id="pills-tabContent-struct">
                                                <div class="tab-pane show active" id="pills-filestruct" role="tabpanel" aria-labelledby="pills-filestruct-tab">
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
                                                <div class="tab-pane show" id="pills-page-struct" role="tabpanel" aria-labelledby="pills-pagestruct-tab">
                                                    <!-- Account Settings Here -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h5 class="mt-5">Horizontal Form</h5>
                                                            <hr>
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                                    </div>
                                                                </div>
                                                                <fieldset class="form-group">
                                                                    <div class="row">
                                                                        <label for="inputPassword3" class="col-sm-3 col-form-label">Radios</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                                                                <label class="form-check-label" for="gridRadios1">First radio</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                                                <label class="form-check-label" for="gridRadios2">Second radio</label>
                                                                            </div>
                                                                            <div class="form-check disabled">
                                                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                                                                <label class="form-check-label" for="gridRadios3">Third disabled radio</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-3">Checkbox</div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                                            <label class="form-check-label" for="gridCheck1">Example checkbox</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5 class="mt-5">Horizontal Form Label Sizing</h5>
                                                            <hr>
                                                            <form>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelLg" class="col-sm-3 col-form-label col-form-label-lg">Email</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <button type="submit" class="btn btn-primary">Change passwaord</button>
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
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/prism/js/prism.min.js') }}"></script>
    <script type="text/javascript">
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
    </script>

</body>

<!-- Mirrored from codedthemes.com/demos/admin-templates/datta-able/bootstrap/default/auth-subscribe.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 07:44:51 GMT -->
</html>
