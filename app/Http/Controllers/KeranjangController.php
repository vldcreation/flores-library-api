<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;

class KeranjangController extends Controller
{
    //
    public function getKeranjangs() {
        $keranjangs = Keranjang::all();
        return response()->json([
            'data' => $keranjangs,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getKeranjangById($id) {
        $keranjangs = Keranjang::find($id);
        if($keranjangs) {
            return response()->json([
                'data' => $keranjangs,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function getJumlahKeranjang($id_buku){
        $dataKeranjang = Keranjang::where('id_buku',$id_buku)->get();
        $jlhKeranjang = $dataKeranjang->count();
        return $jlhKeranjang;
    }

    public function tambahKeranjang(Request $request) {
        $keranjangs = Keranjang::create($request->all());
        if($keranjangs) {
            return response()->json([
                'data' => $keranjangs,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(406) 
        ]);
    }

    public function ubahKeranjang(Request $request, $id) {
        $keranjangs = Keranjang::find($id);
        if($keranjangs) {
            $keranjangs->update($request->all());
            return response()->json([
                'data' => $keranjangs,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function hapusKeranjang($id) {
        $keranjangs = Keranjang::find($id);
        if($keranjangs) {
            if($keranjangs->delete()) {
                return response()->json([
                    'response' => 'Data telah dihapus',
                    'message' => StatusCode::http_response_code(202)
                ]);
            }
            return response()->json([
                'message' => StatusCode::http_response_code(406) 
            ]);            
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);    
    }
}
