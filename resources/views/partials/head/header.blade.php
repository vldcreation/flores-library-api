<?php use App\Http\Resources\Helper; ?>
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="/" class="b-brand">
               <div class="b-bg">
                   <i class="mdi mdi-school"></i>
               </div>
               <span class="b-title">FloresLibrary</span>
           </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#!">Action</a></li>
                        <li><a class="dropdown-item" href="#!">Another action</a></li>
                        <li><a class="dropdown-item" href="#!">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="#!" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="{{route('admin.loan.clear')}}" onclick="return confirm('are you sure?')" class="m-r-10">mark as read</a>
                                    <a href="{{route('admin.loan.clear')}}" onclick="return confirm('are you sure?')" >clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <!-- <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li> -->
                                @if($notifyAdmins->count() < 1):
                                    <li class="notification text-center">
                                    <div class="media">
                                        <div class="media-body">
                                            <p> No Notifications Available </p>
                                        </div>
                                    </div>
                                </li>
                                @else
                                @foreach($notifyAdmins as $key=>$notif)
                                <li class="notification">
                                    <div class="media">
                                        <div class="media-body">
                                            <p><strong> {{$notif->judul}} </strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i> {{Helper::getRemaningTime($notif->created_at)}} </span></p>
                                            <p> {{$notif->deskripsi_singkat}} </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                                <!-- <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li> -->
                                <!-- <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="../assets/images/user/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{asset('/assets/images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                <span> {{Auth::user()->name}} </span>
                                <a href="{{route('auth.logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            
                            <ul class="pro-body">
                                <li><a href="{{route('admin.settings.index')}}" class="dropdown-item"><i class="feather icon-settings"></i> Settings</a></li>
                                <li><a href="{{route('admin.settings.index')}}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="{{route('auth.logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                                <form id="logout-form" action="{{route('auth.logout')}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>