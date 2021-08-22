@extends('layouts.main',['nav' => 'loan'])

@section('main-content')
<!-- Overload style -->
<?php

use App\BookCategory;
use App\Role;
use Illuminate\Support\Str;
use App\Http\Resources\Helper;
$bookCategorys = BookCategory::all();
?>
<style>
    .btn.btn-icon, .btn.drp-icon{
        width : 25px;
        height : 25px;
        padding: 2.5px 6px;
    }
    td.details-control {
    background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('https://cdn.rawgit.com/DataTables/DataTables/6c7ada53ebc228ea9bc28b1b216e793b1825d188/examples/resources/details_close.png') no-repeat center center;
    }
    .img-path>img{
        height: 160px;
        width: 120px;
    }
    .pcoded-navbar .pcoded-inner-navbar > li.dasboard-active > a{
        background: #23b7e5;
        color: #fff;
    }
</style>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
    $(document).ready( function () {
     $.each($('.datatable'), function () {
        var dt_id = $(this).attr('id');
        var dt_action = $(this).data('action');
        if (typeof dt_action !== typeof undefined && dt_action !== false) {
            var dt_ajax = dt_action;
            $('#' + dt_id).DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
            });
         } else {
            var table = $('.datatable').DataTable({
                retrieve: true,
                responsive: true,
            });
        }
    })
});
</script>
<!-- End Style -->
<div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">

                                <!-- [Banner Section] start -->
                                @include('partials.section.global-banner')
                                <!-- [Banner Section] end -->

                                <!-- [ Data Peminjaman Buku ] start -->
                                <div class="col-sm-12" id="kelola-data-peminjaman">
                                    <div class="card">
                                        <div class="row-alert">
                                            @if(session('success_added'))
                                             <script>
                                                 Swal.fire(
                                                    'Nice!',
                                                    session('success_added'),
                                                    'success'
                                                    )
                                             </script>
                                            @endif
                                        </div>
                                        <div class="card-header">
                                            <h5>Data Peminjaman Buku</h5>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(54px, 41px, 0px);">
                                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                        <li class="dropdown-item minimize-card"><a href="#!"><span ><i class="feather icon-minus"></i> collapse</span><span style="display: none;"><i class="feather icon-plus"></i> expand</span></a></li>
                                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-peminjaman">Tambah Data</button>
                                            <p>Daftar Alokasi peminjaman buku yang terdapat pada perpustakaan {{ config('app.name') }}</p>
                                            <div class="table-responsive">
                                                <table id="table1" class="display table nowrap table-striped table-hover datatable" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Member</th>
                                                            <th>List Buku</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($members as $key=>$member)
                                                        <tr>
                                                            @if($member->_peminjamans->count()>0)
                                                            <td>{{ $member->name}}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach($member->_peminjamans as $loan)
                                                                    <li>
                                                                        <a  data-toggle="modal" data-target="#loan-detail-{{$loan->id}}" data-whatever="@hehe">
                                                                            {{$loan->_book['judul']}}
                                                                        </a>
                                                                    </li>

                                                                     <!-- [Lihat Detail Loan] start -->
                                            <div class="modal fade" id="loan-detail-{{$loan->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-detail-categoryLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="row">
                                                                <?php
                                                                    // get only 3 words
                                                                    $result = '';
                                                                    $str = "i want to buy a new car";
                                                                    preg_match("/\S*\s\S*\s\S*\s\S*\s\S*/", $loan->_book['judul'], $result);
                                                                ?>
                                                                    <h5 class="modal-title" style="padding-left:20px;" id="exampleModalLabel"><?= $result[0].'...' ?></h5>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Tanggal Pinjam</th>
                                                                                    <th>Tanggal Kembali</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        {{date('Y-m-d',strtotime($loan->jadwal_pinjam))}}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{  Helper::checkLoan($loan->jadwal_kembali,$loan->id_user,$loan->id) }}
                                                                                        {{date('Y-m-d',strtotime($loan->jadwal_kembali))}}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                                <!-- [Lihat Detail Loan] end -->
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm drp-icon btn-primary" data-toggle="modal" data-target="#modal-detail-data-peminjaman" data-whatever="@hehe"><i class="feather icon-eye"></i></button>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Nama Member</th>
                                                            <th>List Buku</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Recent Data Peminjaman Buku ] end -->

                                <!-- [Modal Tambah Members] start -->
                                <!-- Scrollable modal -->
                                <div class="modal fade" id="modal-tambah-peminjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('admin.loan.store') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="mb-3">
                                                                <label for="role">Anggota : </label>
                                                                <select name="id_user" class="form-control">
                                                                    @foreach($members as $key=>$member)
                                                                        <option value="{{ $member->id }}">{{$member->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="role">Buku Dipinjam</label>
                                                                <select name="id_buku" class="form-control">
                                                                    @foreach($books as $key=>$book)
                                                                    <option value="{{ $book->id }}">{{\Str::limit($book->judul,40,' (...)')}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date_save" class="form-label">Tanggal Pinjam</label>
                                                                <input type="date" name="jadwal_pinjam" value="{{ date('m/d/Y',time()) }}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date_return" class="form-label">Tanggal Kembali</label>
                                                                <input type="date" name="jadwal_kembali" class="form-control">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                <!-- [Modal Tambah Members] end-->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- [Smooth Scrollable] start -->
        <script>
            $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && 
                location.hostname == this.hostname
                ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                    scrollTop: target.offset().top
                    }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                    });
                }
                }
            });
        </script>
        <!-- [Smooth Scrollable] end -->
        
@endsection