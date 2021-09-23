<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;

class PengumumanController extends Controller
{
    //
    public function getPengumuman() {
        $pengumumans = Pengumuman::all();
        if($pengumumans->count() > 0){
            return response()->json([
                'data' => $pengumumans,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => 'Tidak ada data'
        ]);
    }

    public function getPengumumanById($id) {
        $pengumumans = Pengumuman::find($id);
        if($pengumumans) {
            return response()->json([
                'data' => $pengumumans,
                'message' => StatusCode::http_response_code(200)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function tambahPengumuman(Request $request) {
        $pengumumans = Pengumuman::create($request->all());
        if($pengumumans) {
            return response()->json([
                'data' => $pengumumans,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(406) 
        ]);
    }

    public function ubahPengumuman(Request $request, $id) {
        $pengumumans = Pengumuman::find($id);
        if($pengumumans) {
            $pengumumans->update($request->all());
            return response()->json([
                'data' => $pengumumans,
                'message' => StatusCode::http_response_code(201)
            ]);
        }
        return response()->json([
            'message' => StatusCode::http_response_code(404) 
        ]);
    }

    public function hapusPengumuman($id) {
        $pengumumans = Pengumuman::find($id);
        if($pengumumans) {
            if($pengumumans->delete()) {
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
