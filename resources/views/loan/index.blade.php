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

    /* Title elemen modified */
    /* title-tip down */
    .title-tip[title]:hover {
    position: absolute;
    }
    .title-tip[title]:hover:before {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 99999;
    content: attr(title);
    margin-top: 0.5em;
    padding: 0.5em;
    width: 200px;    /* change it */
    overflow: hidden;
    word-wrap: break-word;
    font-size: inherit;
    color: #FFF;
    text-align: center;
    background-color: #222;
    box-sizing: border-box;
    box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
    }
    .title-tip[title]:hover:after {
    position: absolute;
    top: 100%;
    left: 50%;
    z-index: 99999;
    content: '';
    margin-left: -0.125em;
    width: 0;
    height: 0;
    border: 0.25em dashed transparent;
    border-bottom: 0.25em solid #222;
    font-size: inherit;
    }

    /* title-tip-left */
    .title-tip-left[title]:hover:before {
    top: auto;
    left: auto;
    right: 100%;
    margin-top: 0;
    margin-right: 0.5em;
    }
    .title-tip-left[title]:hover:after {
    top: 50%;
    left: auto;
    right: 100%;
    margin-left: 0;
    margin-top: -0.125em;
    border: 0.25em dashed transparent;
    border-left: 0.25em solid #222;
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
                                                <table id="table1" class="table nowrap table-striped table-hover datatable" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Member</th>
                                                            <th style="width: 50%;">List Buku</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($members as $key=>$member)
                                                        <tr>
                                                            <td>{{ $member->name}}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach($member->_inCart as $loan)
                                                                    <li>
                                                                        <a  data-toggle="modal" data-target="#loan-detail-{{$loan->id}}" data-whatever="@hehe">
                                                                            {{$loan->_book['judul']}}
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('admin.loan.detail',$member->id)}}" class="btn drp-icon btn-sm btn-primary"> <i class="feather icon-eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Nama Member</th>
                                                            <th style="width: 50%;">List Buku</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Recent Data Peminjaman Buku ] end -->

                                <!-- [Modal Tambah Peminjamans] start -->
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
                                                                    @foreach($allMembers as $key=>$member)
                                                                        <option value="{{ $member->id }}">{{$member->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="role">Buku Dipinjam</label>
                                                                <select name="id_buku" class="form-control">
                                                                    @foreach($books as $key=>$book)
                                                                    <option value="{{ $book->id }}">{{ $book->barcode.' - '.\Str::limit($book->judul,30,' (...)')}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date_save" class="form-label">Tanggal Pinjam</label>
                                                                <input type="date" id="jd_pinjam" name="jadwal_pinjam" value="{{ date('m/d/Y',time()) }}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date_return" class="form-label">Tanggal Kembali</label>
                                                                <input type="date" id="jd_kembali" name="jadwal_kembali" class="form-control">
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
                                <!-- [Modal Tambah Peminjamans] end-->

                                <!-- Handling Book Review (: -->
                                @if(App\Review::count() > 0)
                                <!-- [ Book Reviews Section ] start -->
                                <div class="col-xl-12 col-md-12" id="review-buku">
                                    <div class="card code-table">
                                        <div class="card-header">
                                            <h5>Book Reviews</h5>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(54px, 41px, 0px);">
                                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block pb-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Barcode</th>
                                                            <th>ISBN</th>
                                                            <th>Judul</th>
                                                            <th class="text-right">Ratings</th>
                                                    </tr></thead>
                                                    <tbody>
                                                        @foreach($allbooks as $key => $book)
                                                        <tr>
                                                            <td>
                                                                <h6 class="mb-1">{{$book->id}}</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-1">{{ $book->isbn }}</h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="m-b-0"> {{\Str::limit($book->judul,40,' (...)')}} </h6>
                                                            </td>
                                                            <td class="text-right">
                                                                @if(Helper::getRating($book->id)['rating'] > 0)
                                                                @for($i = 0;$i < Helper::getRating($book->id)['rating']; $i++)
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-c-yellow"></i></a>
                                                                @endfor
                                                                @for($i = 0;$i < 5-Helper::getRating(1)['rating']; $i++)
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                @endfor
                                                                @else
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                <a href="javascript:void(0)" title="{{Helper::getRating($book->id)['title']}}" class="title-tip title-tip-left"><i class="fa fa-star f-18 text-black-50"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- [ Recent Book Reviews ] end -->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default value to jadwal pinjam & jadwal kembali -->
        <script>
            var date = new Date();
            document.getElementById('jd_pinjam').valueAsDate = date;
            date.setDate(date.getDate() + 7);
            document.getElementById('jd_kembali').valueAsDate = date;
        </script>

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