<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Resources\StatusCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function indexBook(){
        return view('Book.indexBook');
    }

    public function show($id){
        $books = Book::where('barcode',$id)->first();
        // dd($books);
        return view('Book.detail',['books' => $books]);
    }

    public function store(Request $request){
        $lastId = Book::pluck('id')->last();
        $url = url('books/'.$request->input('barcode'));
        $data2 = array_merge($request->all(),['url' => $url]);
        // dd($url);
        if($request->hasfile('gambar_buku')){
            $file = $request->file('gambar_buku');
            $extension = $file->getClientOriginalExtension();
            $namefile = str_replace('/','',Hash::make($file->getClientOriginalName()));
            $lastfilename = $namefile.'.'.$extension;
            $path = $file->storeAs(
                'public/file-image',$lastfilename
            );
            $data2 = array_merge($data2,['gambar_buku' => $lastfilename,
            'path_gambar' => $path]);

        }
        if($request->hasfile('file_buku')){
            $file = $request->file('file_buku');
            $extension = $file->getClientOriginalExtension();
            $namefile = str_replace('/','',Hash::make($file->getClientOriginalName()));
            $lastfilename = $namefile.'.'.$extension;
            $path = $file->storeAs(
                'public/file-pdf',$lastfilename
            );
            $data2 = array_merge($data2,['file_buku' => $lastfilename,
            'path_file' => $path]);
        }
        // dd($data2);
        Book::create($data2);
        return redirect()->route('admin.index');
    }

    public function update(Request $request , $id){
        $data = Book::find($id);
        $data2 = array();
        // dd($request->all());
        if($data->count()>0){
            if($request->hasfile('gambar_buku')){
                $file = $request->file('gambar_buku');
                $extension = $file->getClientOriginalExtension();
                $namefile = str_replace('/','',Hash::make($file->getClientOriginalName()));
                $lastfilename = $namefile.'.'.$extension;
                $path = $file->storeAs(
                    'public/file-image',$lastfilename
                );
                $data2 = array_merge($request->all(),['gambar_buku' => $lastfilename,
                'path_gambar' => $path]);
                $data->update($data2);
                return redirect()->route('admin.index');
    
            }
            if($request->hasfile('file_buku')){
                $file = $request->file('file_buku');
                $extension = $file->getClientOriginalExtension();
                $namefile = str_replace('/','',Hash::make($file->getClientOriginalName()));
                $lastfilename = $namefile.'.'.$extension;
                $path = $file->storeAs(
                    'public/file-pdf',$lastfilename
                );
                $data2 = array_merge($data2,['file_buku' => $lastfilename,
                'path_file' => $path]);
                $data->update($data2);
                return redirect()->route('admin.index');
            }
            $data->update($request->all());
            return redirect()->route('admin.index');
        }
        else{
            abort(404);
        }
    }

    public function getBooks(){
        $data = Book::all();
        foreach($data as $d):
            $d['url'] = URL::to('/').'/books/'.$d['barcode'];
        endforeach;
        return response()->json([
            'data' => $data,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getBookById($id){
        $data = Book::where('id',$id)->orwhere('barcode',$id)->get()->toArray();
        $data[0]['url'] = URL::to('/').'/'.$data[0]['url'];
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function getBookByKeyword($keyword){

        $data = Book::where('judul','LIKE',"%$keyword%")->orwhere('barcode','LIKE',"%$keyword%")
        ->orwhere('deskripsi','LIKE',"%$keyword%")
        ->get();
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function getBookByKategory($category){
        $kategory = BookCategory::where('nama_kategori',$category)->first();
        if(!$category){
            // Not found
            return response()->json([
                'status' => StatusCode::http_response_code(404),
                'message' => 'no data exist!'
            ]);
        }else{
            $data = $kategory->allbooks;
            return response()->json([
                'status' => StatusCode::http_response_code(200),
                'data' => $data,
            ]);
        };
    }

    public function addBook(Request $request){
        $data = Book::create(array_merge($request->all(),['path_gambar' => 'assets/file-image/'.$request->input('gambar_buku'),'path_file' => 'assets/file-pdf/'.$request->input('file_buku')]));
        if($data){
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(406)
        ]);
    }

    public function updateBook(Request $request,$id){
        $data = Book::find($id);
        if($data){
            $data->update($request->all());
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }

    public function deleteBook($id){
        $data = Book::find($id);
        if($data){
            if($data->delete()){
                return response()->json([
                    'response' => 'Record was Delete',
                    'message' => StatusCode::http_response_code(202)
                ]);
            }
            //Failde Deleete
            return response()->json([
                'message' => StatusCode::http_response_code(406)
            ]);

        }
        //Record not found
        return response()->json([
            'message' => StatusCode::http_response_code(404)
        ]);
    }
}
