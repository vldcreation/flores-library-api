<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    public function indexBook(){
        return view('Book.indexBook');
    }

    public function store(Request $request){
        $Book = new Book();
        if($request->hasfile('file_buku') || $request->hasfile('gambar_buku')){
            $file = $request->file('file_buku');
            $file2 = $request->file('gambar_buku');
            $extension = $file->getClientOriginalExtension();
            $extension2 = $file2->getClientOriginalExtension();
            $hashFile = Hash::make($file->getClientOriginalName());
            $hashFile2 = Hash::make($file2->getClientOriginalName());
            $filename = $hashFile.'-'.time().'.'.$extension;
            $filename2 = $hashFile2.'-'.time().'.'.$extension2;
            // dd($filename);
            $file->move('assets/file-pdf',$filename);
            $file2->move('assets/file-image',$filename2);
            $data = array_merge($request->all(),['file_buku' => $filename,'gambar_buku' => $filename2]);
            // dd($data);
            Book::create($data);
        }else{
            return $request;
        }
        return view('Book.indexBook');
    }

    public function getBooks(){
        $data = Book::all();
        return response()->json([
            'data' => $data,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getBookById($id){
        $data = Book::where('id',$id)->orwhere('barcode',$id)->get();
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

    public function addBook(Request $request){
        $data = Book::create($request->all());
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
