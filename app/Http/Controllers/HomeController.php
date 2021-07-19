<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

class HomeController extends Controller
{
    //
    public function index(){
        return view('Web.index');
    }

    public function demo(){
        $data = Book::all();
        $data2 = DB::table('book')->skip(3)->take(Book::count())->get();
        return view('Web.demo',['data' => $data,'data2' => $data2]);
    }
}
