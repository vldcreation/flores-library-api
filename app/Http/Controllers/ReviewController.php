<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;

class ReviewController extends Controller
{
    public function getReviews(){
        $data = Review::all();
        return response()->json([
            'data' => $data,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getReviewById($id){
        $data = Review::find($id);
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

    public function getBookRating($id_buku){
        $data = Review::where('id_buku',$id_buku)->get();
        // dd($data);
        if(!$data->count()){
            return array(
                'rating' => 0,
                'title' => 0
            );
        }
        $countRecord = $data->count();
        $CountRating = $data->sum('rating');
        $arrData = [
            'rating' => floor($CountRating/$countRecord),
            'title' => round($CountRating/$countRecord,1)
        ];
        return $arrData;
        // return $CountRating;
    }

    public function addReview(Request $request){
        $data = Review::create($request->all());
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

    public function updateReview(Request $request,$id){
        $data = Review::find($id);
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

    public function deleteReview($id){
        $data = Review::find($id);
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
