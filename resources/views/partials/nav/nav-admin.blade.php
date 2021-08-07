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
                    <li data-username="dashboard Default" class="nav-item active">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Management Anggota</label>
                    </li>
                    <li data-username="Kelola-anggota" class="nav-item">
                        <a href="#kelola-anggota" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Kelola Anggota</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Management Kategori Buku</label>
                    </li>
                    <li data-username="Kelola-Kategori-Buku" class="nav-item">
                        <a href="#kelola-kategori-buku" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Kelola Kategori Buku</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Management Buku</label>
                    </li>
                    <li data-username="Kelola-Data-Buku" class="nav-item">
                        <a href="#kelola-data-buku" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Kelola Data Buku</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>