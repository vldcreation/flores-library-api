@extends('layouts.main',['nav' => 'loan'])
<?php
use App\Http\Resources\Helper;
?>
@section('main-content')
<div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Loan Detail</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="{{route('admin.loan.index')}}">loan</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Loan Detail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ task-detail ] start -->
                                <div class="col-xl-4 col-lg-12 task-detail-right">
                                    <div class="card">
                                        <div class="card-block bg-c-blue">
                                            <div class="counter text-center">
                                                <h4 id="timer" class="text-white m-0"></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Member Details</h5>
                                        </div>
                                        <div class="card-block task-details">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fas fa-user-alt m-r-5"></i> Nama:</td>
                                                        <td class="text-right"><span class="float-right"><a class="text-secondary" href="#!">{{$member->name}}</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="far fa-calendar-alt m-r-5"></i> Terdaftar:</td>
                                                        <td class="text-right">{{date('Y-m-d',strtotime($member->created_at))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="far fa-credit-card m-r-5"></i> Email:</td>
                                                        <td class="text-right">{{$member->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fas fa-thermometer-half m-r-5"></i> Status:</td>
                                                        <td class="text-right"> {{($member->is_active)? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-3"><i class="fas fa-ticket-alt m-r-5"></i> List Buku dipinjam</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="m-b-20">
                                                <h6>List buku dipinjam</h6>
                                                <hr>
                                                <div class="table-responsive m-t-20">
                                                    <table class="table m-b-0 f-14 b-solid requid-table">
                                                        <thead>
                                                            <tr class="text-uppercase">
                                                                <th class="text-center">#</th>
                                                                <th class="text-center">Judul</th>
                                                                <th class="text-center">Tanggal Pinjam</th>
                                                                <th class="text-center">Tanggal Kembali</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl-loan" class="text-center text-muted">
                                                            @foreach($member->_peminjamans as $key => $loan)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td> {{\Str::limit($loan->_book->judul,40,' (...)')}} </td>
                                                                <td> <i class="far fa-calendar-alt"></i>&nbsp; {{date('Y-m-d',strtotime($loan->jadwal_pinjam))}} </td>
                                                                <td> <i class="far fa-calendar-alt"></i>&nbsp; {{date('Y-m-d',strtotime($loan->jadwal_kembali))}}</td>
                                                                <td>Dipinjam</td>
                                                                <td>
                                                                    <a href="{{route('admin.loan.return',$loan->id)}}" class="btn btn-sm btn-info" onclick="return confirm('Buku akan dikembalikan , Sungguh ?')"> <span class="feather icon-corner-up-left" title="return"></span> </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="float-left mt-4">
                                                <span class=" txt-primary"> <i class="fas fa-chart-line"></i>
                                                    Status:</span>
                                                <div class="dropdown-secondary dropdown d-inline-block">
                                                    <button class="btn btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Open</button>
                                                    <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item active" href="#!">Dipinjam</a>
                                                        <a class="dropdown-item" href="#!">Dikembalikan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text"><i class="fas fa-plus m-r-5"></i> Notif</h5>
                                        </div>
                                        <div class="card-block task-comment">
                                            <ul class="media-list p-0">
                                                @foreach($member->_notifymembers as $key => $notify)
                                                <li class="media">
                                                    <div class="media-body">
                                                        <h6 class="media-heading txt-primary"> {{Auth::user()->name}} <span class="f-12 text-muted ml-1"> {{Helper::getRemaningTime($notify->created_at)}} </span></h6>
                                                        <p> Halo {{$member->name}} <br> {{$notify->deskripsi_panjang}} </p>
                                                        <div class="m-t-10 m-b-25">
                                                            <span><a href="{{route('admin.loan.deleteNotify',$notify->id)}}" onclick="return confirm('Are you sure?')" class="m-r-10 text-secondary">Delete</a> </span>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <form action="{{route('admin.loan.notifymember')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_user" value="{{$member->id}}">
                                            <div class="input-group mb-3">
                                                <input type="text" name="deskripsi_panjang" class="form-control" placeholder="Kirim Notif...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-icon" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ task-detail ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        //Get Date from last loan
        var table = document.getElementById("tbl-loan");
        let lastRow = table.rows[table.rows.length-1];
        let returnCell = lastRow.cells[lastRow.cells.length-2].innerHTML;
        // Set the date we're counting down to
        var d = new Date(returnCell);
        var countDownDate = new Date(d).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var hari = Math.floor(distance / (1000 * 60 * 60 * 24));
            var jam = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var menit = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var detik = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML = "<b>"+hari + "</b>hari : <b>" +  jam + "</b>jam : <b>" +
                menit + "</b>menit : <b>" + detik + "</b>detik ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection