<?php

namespace App\Http\Controllers;

use App\KategoriPengumuman;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;

class KategoriPengumumanController extends Controller
{
    //
    public function getKategoriPengumuman() {
        $kategoriPengumumans = KategoriPengumuman::all();
        return response()->json([
            'data' => $kategoriPengumumans,
            'message' => StatusCode::http_response_code(200)
        ]);
    }

    public function getKategoriPengumumanById($id) {
        $kategoriPengumumans = KategoriPengumuman::find($id);
        if($kategoriPengumumans) {
            return response()->json([
                'data' => $kategoriPengumumans,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function tambahKategoriPengumuman(Request $request) {
        $kategoriPengumumans = KategoriPengumuman::create($request->all());
        if($kategoriPengumumans) {
            return response()->json([
                'data' => $kategoriPengumumans,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(406) 
        ]);
    }

    public function ubahKategoriPengumuman(Request $request, $id) {
        $kategoriPengumumans = KategoriPengumuman::find($id);
        if($kategoriPengumumans) {
            $kategoriPengumumans->update($request->all());
            return response()->json([
                'data' => $kategoriPengumumans,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function hapusKategoriPengumuman($id) {
        $kategoriPengumumans = KategoriPengumuman::find($id);
        if($kategoriPengumumans) {
            if($kategoriPengumumans->delete()) {
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
