<?php 
use Illuminate\Support\Facades\DB;
use App\BookCategory;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/demo2.css') }}">
    <title>Demo Book</title>
</head>
<body>
 <div class="row">
     <div class="header-book">
         <h4>Daftar Buku</h4>
     </div>
 </div>
 <div class="root-container">
<div class="container">
    @foreach($data as $book)
  <div class="card">
    <div class="card-header">
      <img src=" {{ asset('assets/file-image/'.$book->gambar_buku) }}" style="height:160px;width:120px;" alt="rover" />
    </div>
    <div class="card-body">
      <h4>
        {{ $book->judul }}
      </h4>
      <p>
      {{ $book->deskripsi }}
      </p>
      <div class="user">
        <div class="user-info">
          <h5>{{$book->penulis}}</h5>
          <small>2h ago</small>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
</body>
</html>