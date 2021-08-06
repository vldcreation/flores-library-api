<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function indexBook(){
        return view('Book.indexBook');
    }

    public function store(Request $request){
        $Book = new Book();
        if($request->hasfile('file_buku') && $request->hasfile('gambar_buku')){
            $file = $request->file('file_buku');
            $file2 = $request->file('gambar_buku');
            $extension = $file->getClientOriginalExtension();
            $extension2 = $file2->getClientOriginalExtension();
            $hashFile = Hash::make($file->getClientOriginalName());
            $hashFile2 = Hash::make($file2->getClientOriginalName());
            $filename = $hashFile.'-'.time().'.'.$extension;
            $filename2 = $hashFile2.'-'.time().'.'.$extension2;
            $lastfilename = str_replace('/', '', $filename);
            $lastfilename2 = str_replace('/', '', $filename2);
            // dd($filename);
            // $file->move('assets/file-pdf',$lastfilename);
            // $file2->move('assets/file-image',$lastfilename2);
            $path1 = $file->storeAs(
                'public/file-pdf', $lastfilename
            );
            $path2 = $file2->storeAs(
                'public/file-image', $lastfilename2
            );
            $data = array_merge($request->all(),
            ['file_buku' => $lastfilename,'gambar_buku' => $lastfilename2,
            'path_gambar' => $path2,'path_file' => $path1
            ]);
            // dd($data);
            Book::create($data);
        }else{
            return $request;
        }
        return redirect()->route('admin.index');
    }

    public function update(Request $request , $id){
        $data = Book::find($id);
        $data2 = array();
        if($data){
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
            $data->update($data2);
            return redirect()->route('admin.index');
        }
        else{
            abort(404);
        }
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
