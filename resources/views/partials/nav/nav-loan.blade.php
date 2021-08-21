<?php Use App\Http\Controllers\AdminController; ?>
<nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="{{ url('/') }}" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-layers"></i>
                    </div>
                    <span class="b-title">{{config('app.name')}}</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default" class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li data-username="dashboard Default" class="nav-item dasboard-active">
                        <a href="{{route('admin.loan.index')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard 2</span>
                        </a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Kelola Data Peminjaman</label>
                    </li>
                    <li data-username="Kelola-data-peminjaman" class="nav-item">
                        <a href="#kelola-data-peminjaman" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Kelola Data Peminjaman</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>