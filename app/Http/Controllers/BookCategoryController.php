<?php

namespace App\Http\Controllers;

use App\BookCategory;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;
class BookCategoryController extends Controller
{
    public function getCategorys(){
        $data = BookCategory::all();
        return response()->json([
            'data' => $data,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getCategoryById($id){
        $data = BookCategory::find($id);
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

    public function addCategory(Request $request){
        $data = BookCategory::create($request->all());
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

    public function updateCategory(Request $request,$id){
        $data = BookCategory::find($id);
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

    public function deleteCategory($id){
        $data = BookCategory::find($id);
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
