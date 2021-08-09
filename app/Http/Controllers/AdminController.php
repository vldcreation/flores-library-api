<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use App\Peminjaman;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        $categorys = BookCategory::all();
        $members = User::where('role',3)->get();
        $roles = Role::all();
        $peminjamans = Peminjaman::all();
        // $laonUsers = User::where('id',3)->first()->_peminjamans->count();
        // dd($laonUsers);
        return view('home',['books' => $books,'members' => $members,
        'categorys' => $categorys,'roles' => $roles,'peminjamans' => $peminjamans
        ]);
    }

    public function getBook($book_path){
        // dd($book_path);
        return response()->download(storage_path('app/public/file-pdf/'. $book_path));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);
        if($book){
            $book->delete();
            return redirect()->route('admin.index')
            ->with('success','User deleted successfully');
        }else{
            return redirect()->route('admin.index');
        }
    }
}
