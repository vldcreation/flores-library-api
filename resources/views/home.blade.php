@extends('layouts.main')
@section('main-content')
<!-- Overload style -->
<?php

use App\BookCategory;
use App\Role;
use Illuminate\Support\Str;
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

                                <!-- [ Members Section ] start -->
                                <div class="col-sm-12" id="kelola-anggota">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Anggota</h5>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahMembers">Tambah Data</button>
                                            <p>Daftar Anggota Members di perpustakaan {{ config('app.name') }}</p>
                                            <div class="table-responsive">
                                                <table id="zero-configuration" class="display table nowrap table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Telp</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Alamat</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($members as $key=>$member)
                                                        <tr>
                                                            <td>{{ (is_null($member->name)) ? '(not set)' : $member->name }}</td>
                                                            <td>{{ (is_null($member->email)) ? '(not set)' : $member->email }}</td>
                                                            <td>{{ (is_null($member->no_telp)) ? '(not set)' : str_replace('+62','0',str_replace('-','',$member->no_telp)) }}</td>
                                                            <td>{{ (is_null($member->tanggal_lahir)) ? '(not set)' : $member->tanggal_lahir }}</td>
                                                            <td>{{ (is_null($member->jenis_kelamin)) ? '(not set)' : $member->jenis_kelamin }}</td>
                                                            <td>{{ (is_null($member->alamat)) ? '(not set)' : $member->alamat }}</td>
                                                            <td>
                                                                <button class="btn btn-sm drp-icon btn-primary" data-toggle="modal" data-target="#modal-detail-member-{{$member->id}}" data-whatever="@hehe"><i class="feather icon-eye"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-success" data-toggle="modal" data-target="#modal-edit-member-{{$member->id}}" type="button"><i class="feather icon-edit"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-danger delete-confirm" data-whatever="{{ $member->judul }}" data-target="{{ route('deleteMember',$member->id) }}"  type="button"><i class="feather icon-trash-2"></i></button>
                                                            </td>
                                                        </tr>

                                                        <!-- [Lihat Detail Member] start -->
                                                        <div class="modal fade" id="modal-detail-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$member->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <lable>Email : </lable>
                                                                    {{$member->email}}
                                                                </div>
                                                                <div class="col-md-4 ms-auto img-path">
                                                                    <img src="{{ route('getimg',$member->profile) }}" alt="">
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                    <span class="badge badge-pill badge-info">{{ str_replace('+62','0',str_replace('-','',$member->no_telp)) }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-sm-9">
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Tanggal Lahir : </label>
                                                                        {{$member->tanggal_lahir}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Jenis Kelamin : </label>
                                                                        {{$member->jenis_kelamin}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Alamat : </label>
                                                                        {{$member->alamat}}
                                                                    </div>
                                                                    </div>
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
                                                <!-- [Lihat Detail Member] end -->

                                                <!-- [Edit  Member] end -->
                                                <div class="modal fade" id="modal-edit-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data - {{ $member->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('editmember',$member->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$member->id}}">
                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">Role Akses</label>
                                                                <select name="role" class="form-control">
                                                                    @foreach($roles as $key=>$role)
                                                                    <option value="{{ $role->id }}" {{($role->id == $member->role) ? 'selected' : ''}}>{{$role->role_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Nama Member</label>
                                                                <input type="text" name="name" value="{{$member->name}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="JK" class="form-label">Jenis Kelaim</label>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" value="pria" id="customControlValidation2-{{$member->id}}" name="jenis_kelamin" {{($member->jenis_kelamin == 'pria') ? 'checked' : ''}}>
                                                                    <label class="custom-control-label" for="customControlValidation2-{{$member->id}}">Pria</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-3">
                                                                    <input type="radio" class="custom-control-input" value="wanita" id="customControlValidation3-{{$member->id}}" name="jenis_kelamin" {{($member->jenis_kelamin == 'wanita') ? 'checked' : ''}}>
                                                                    <label class="custom-control-label" for="customControlValidation3-{{$member->id}}">Wanita</label>
                                                                    <div class="invalid-feedback">More example invalid feedback text</div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tl" class="form-label">No Telp</label>
                                                                <input type="text" value="{{str_replace('+62','',str_replace('-','',$member->no_telp))}}" name="no_telp" class="form-control id_telephone" data-mask="(62) 999-9999-9999">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tl" class="form-label">Tanggal Lahir</label>
                                                                <input type="date" value="{{$member->tanggal_lahir}}" name="tanggal_lahir" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea name="alamat" class="form-control">{{$member->alamat}}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="text" name="email" value="{{$member->email}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="aktivasi" class="form-label">Aktivasi</label>
                                                                <select name="is_active" class="form-control">
                                                                    <option value="true" {{($member->is_active == 1) ? 'selected' : ''}}>Aktif</option>
                                                                    <option value="false" {{($member->is_active == 0) ? 'selected' : ''}}>Non-Aktif</option>
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 img-path">
                                                                    <label> Profile : </label>
                                                                    <img src="{{ route('getimg',$member->profile) }}">
                                                                </div>
                                                                <div class="col-md-8 ms-auto" style="display:flex;align-items:center;justify-content:flex;">
                                                                    <input type="file" name="profile" value="{{$member->profile}}" class="form-control">
                                                                </div>
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

                                                <!-- [Edit Member] end -->
                                                        
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Telp</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Alamat</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Recent Members ] end -->


                                 <!-- [ Book Category Section ] start -->
                                 <div class="col-sm-12" id="kelola-subject-buku">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Subject Buku</h5>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahCategory">Tambah Data</button>
                                            <p>Daftar Subject buku yang terdapat pada perpustakaan {{ config('app.name') }}</p>
                                            <div class="table-responsive">
                                                <table id="table2" class="display table nowrap table-striped table-hover datatable" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Subject</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($bookCategorys as $key=>$category)
                                                        <tr>
                                                            <td>{{ $category->nama_kategori }}</td>
                                                            <td>
                                                                <button class="btn btn-sm drp-icon btn-primary" data-toggle="modal" data-target="#modal-detail-category-{{$category->id}}" data-whatever="@hehe"><i class="feather icon-eye"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-success" data-toggle="modal" data-target="#modal-edit-category-{{$category->id}}" type="button"><i class="feather icon-edit"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-danger delete-confirm" data-whatever="{{ $category->judul }}" data-target="{{ route('deletecat',$category->id) }}"  type="button"><i class="feather icon-trash-2"></i></button>
                                                            </td>
                                                        </tr>

                                                        <!-- [Lihat Detail Category] start -->
                                            <div class="modal fade" id="modal-detail-category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-detail-categoryLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Subject : {{$category->nama_kategori}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label for="List Buku by Kategori">
                                                                            List Buku :
                                                                        </label>
                                                                        @if($category->allbooks->count() < 1)
                                                                        Data Tidak Tersedia
                                                                        @else
                                                                            @foreach($category->allbooks as $obj)
                                                                                <div class="col-12 col-sm-12">
                                                                                    <ul>
                                                                                        <li>{{$obj->judul}}</li>
                                                                                    </ul>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
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
                                                <!-- [Lihat Detail Category] end -->

                                                <!-- [Edit Category Buku ] start -->
                                                <div class="modal fade" id="modal-edit-category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-detail-categoryLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Subject : {{$category->nama_kategori}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                <form class="form-inline" action="{{route('editcat',$category->id)}}" method="POST">
                                                                    @csrf
                                                                <div class="form-group mr-2 mb-2">
                                                                    <label for="Nama Subject" class="sr-only">Nama Subject</label>
                                                                    <input type="text" name="nama_kategori" class="form-control" id="namakat" value="{{$category->nama_kategori}}">
                                                                </div>
                                                                <div class="form-group mr-2">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                            </form>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                                <!-- [Edit Category Buku] end -->
                                                        
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Nama Subject</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- [ Recent Book Category ] end -->
                                

                                <!-- [ Book Section ] start -->
                                <div class="col-sm-12" id="kelola-data-buku">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Data Buku</h5>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
                                            <p>Daftar buku buku yang terdapat pada perpustakaan {{ config('app.name') }}</p>
                                            <div class="table-responsive">
                                                <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Barcode</th>
                                                            <th>ISBN</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($books as $key=>$book)
                                                        <tr>
                                                            <td>{{ $book->barcode }}</td>
                                                            <td>{{ $book->isbn }}</td>
                                                            <td>{{ $book->judul }}
                                                                @if($book->isAvailable == 1)
                                                                    <span class="badge badge-pill badge-info pr-2" style="margin-left:10px">tersedia</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger pr-2" style="margin-left:10px">sedang dipinjam</span>
                                                                @endif
                                                            </td>
                                                            <td><textarea disabled class="form-control" id="exampleFormControlTextarea1" style="resize:none;border:none;overflow:auto;display:block;" rows="6">{{ $book->deskripsi }}</textarea></td>
                                                            <td>
                                                                <button class="btn btn-sm drp-icon btn-primary" data-toggle="modal" data-target="#exampleModal-{{$book->id}}" data-whatever="@hehe"><i class="feather icon-eye"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-success" data-toggle="modal" data-target="#modalEdit-{{$book->id}}" type="button"><i class="feather icon-edit"></i></button>
                                                                <button class="btn btn-sm drp-icon btn-danger delete-confirm" data-whatever="{{ $book->judul }}" data-target="{{ route('deletebook',$book->id) }}"  type="button"><i class="feather icon-trash-2"></i></button>
                                                            </td>
                                                        </tr>

                                                        <!-- [Lihat Detail] start -->
                                            <div class="modal fade" id="exampleModal-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$book->judul}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                <div class="col-md-6">
                                                                    <lable>Penulis : </lable>
                                                                    {{$book->penulis}}
                                                                </div>
                                                                <div class="col-md-4 ms-auto img-path">
                                                                    <img src="{{ route('getimg',(strlen($book->gambar_buku) > 0) ? $book->gambar_buku : 'default.png') }}" alt="">
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                    <span class="badge badge-pill badge-info">{{ BookCategory::where('id',$book->id_kategori)->pluck('nama_kategori')->first() }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-sm-9">
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Bahasa : </label>
                                                                        {{$book->bahasa}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Edisi : </label>
                                                                        {{$book->edisi}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Tahun Terbit : </label>
                                                                        {{$book->tahun_terbit}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>klasifikasi : </label>
                                                                        {{$book->subject}}
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>lokasi : </label>
                                                                        {{$book->lokasi}}
                                                                    </div>
                                                                    <div class="col-8 col-sm-12">
                                                                        <label>Url : </label>
                                                                        <a href="{{url($book->url)}}" target="_blank" rel="noopener noreferrer">{{url($book->url)}}</a>
                                                                    </div>
                                                                    </div>
                                                                        <div class="row">
                                                                            <div class="col-8 col-sm-12">
                                                                            @if(Str::length($book->file_buku) > 0)
                                                                            <a target="_blank" href="{{route('getbook',$book->file_buku)}}" class="btn btn-primary">Download E-Book</a>
                                                                            @endif
                                                                            </div>
                                                                        </div>
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
                                                <!-- [Lihat Detail] end -->

                                                <!-- [Edit Buku ] start -->
                                            <div class="modal fade" id="modalEdit-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data - {{ $book->judul }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('editbuku',$book->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                            <input type="hidden" name="id" value="{{$book->id}}">
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                                                <select name="id_kategori" class="form-control">
                                                                    @foreach($categorys as $key=>$category)
                                                                    <option value="{{ $category->id }}" {{($category->id == $book->id_kategori) ? 'selected' : ''}}>{{$category->nama_kategori}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">ISBN</label>
                                                                <input type="text" name="isbn" value="{{$book->isbn}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Barcode</label>
                                                                <input type="text" name="barcode" value="{{$book->barcode}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">judul</label>
                                                                <input type="text" name="judul" value="{{$book->judul}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">deskripsi</label>
                                                                <input type="text" name="deskripsi" value="{{$book->deskripsi}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">penulis</label>
                                                                <input type="text" name="penulis" value="{{$book->penulis}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">penerbit</label>
                                                                <input type="text" name="penerbit" value="{{$book->penerbit}}" class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 img-path">
                                                                    <label> gambar saat ini : </label>
                                                                    <img src="{{ route('getimg',(strlen($book->gambar_buku) > 0) ? $book->gambar_buku : 'default.png') }}" alt="{{$book->gambar_buku}}">
                                                                </div>
                                                                <div class="col-md-8 ms-auto" style="display:flex;align-items:center;justify-content:flex;">
                                                                    <input type="file" name="gambar_buku" value="{{$book->gambar_buku}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="file buku">
                                                                        File saat ini :
                                                                        @if(Str::length($book->file_buku) > 0)
                                                                            <a target="_blank" href="{{route('getbook',$book->file_buku)}}" class="btn btn-primary">Download E-Book</a>
                                                                        @endif
                                                                    </label>getbook
                                                                </div>
                                                                <div class="col-md-8 ms-auto">
                                                                    <label for="exampleInputEmail1" class="form-label">file_buku</label>
                                                                    <input type="file" value="{{$book->file_buku}}" name="file_buku" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">bahasa</label>
                                                                <input type="text" name="bahasa" value="{{$book->bahasa}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">	edisi</label>
                                                                <input type="text" name="edisi" value="{{$book->edisi}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">	tahun_terbit</label>
                                                                <input type="text" name="tahun_terbit" value="{{$book->tahun_terbit}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Klasifikasi</label>
                                                                <input type="text" name="subject" value="{{$book->subject}}" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">lokasi</label>
                                                                <input type="text" name="lokasi" value="{{$book->lokasi}}" class="form-control">
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

                                                <!-- [Edit Buku] end -->
                                                        
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Barcode</th>
                                                            <th>ISBN</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Recent Book ] end -->

                                <!-- [Modal Tambah Members] start -->
                                <!-- Scrollable modal -->
                                <div class="modal fade" id="modalTambahMembers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="mb-3">
                                                                <label for="role">Role</label>
                                                                <select name="role" class="form-control">
                                                                    @foreach($roles as $key=>$role)
                                                                    <option value="{{ $role->id }}" {{($role->id == 3 ? 'selected' : '')}}>{{$role->role_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                                <input type="text" name="name" placeholder="eg : Jhony" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="JK" class="form-label">Jenis Kelaim</label>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" value="pria" id="customControlValidation4" name="jenis_kelamin" required="">
                                                                    <label class="custom-control-label" for="customControlValidation4">Pria</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-3">
                                                                    <input type="radio" class="custom-control-input" value="wanita" id="customControlValidation5" name="jenis_kelamin" required="">
                                                                    <label class="custom-control-label" for="customControlValidation5">Wanita</label>
                                                                    <div class="invalid-feedback">More example invalid feedback text</div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tl" class="form-label">Tanggal Lahir</label>
                                                                <input type="date" name="tanggal_lahir" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea name="alamat" placeholder="Jl.Anggrek no 16" class="form-control"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="text" name="email" placeholder="eg : jhonny@gmail.com" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" name="username" placeholder="eg : jhonny... " class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" name="password" placeholder="choose password..." class="form-control">
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

                                <!-- [Modal Tambah Category] start -->
                                <div class="modal fade" id="modalTambahCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="mb-3">
                                                                <label for="Nama Subject" class="form-label">Nama Subject : </label>
                                                                <input type="text" name="nama_kategori" class="form-control">
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
                                <!-- [Modal Tambah Category] end-->

                                <!-- Modal Tambah Buku -->
                                <!-- Scrollable modal -->
                                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="{{ route('uploadImage') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="mb-3">
                                                                <select name="id_kategori" class="form-control">
                                                                    @foreach($categorys as $key=>$category)
                                                                    <option value="{{ $category->id }}">{{$category->nama_kategori}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Barcode</label>
                                                                <input type="text" name="barcode" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">judul</label>
                                                                <input type="text" name="judul" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">ISBN</label>
                                                                <input type="text" name="isbn" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">deskripsi</label>
                                                                <input type="text" name="deskripsi" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">penulis</label>
                                                                <input type="text" name="penulis" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">penerbit</label>
                                                                <input type="text" name="penerbit" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">gambar_buku</label>
                                                                <input type="file" name="gambar_buku" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">file_buku</label>
                                                                <input type="file" name="file_buku" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">bahasa</label>
                                                                <input type="text" name="bahasa" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">	edisi</label>
                                                                <input type="text" name="edisi" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">	tahun_terbit</label>
                                                                <input type="text" name="tahun_terbit" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Klsifikasi</label>
                                                                <input type="text" name="subject" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">lokasi</label>
                                                                <input type="text" name="lokasi" class="form-control">
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
                                <!-- End Modal Tambah Buku -->

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
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
