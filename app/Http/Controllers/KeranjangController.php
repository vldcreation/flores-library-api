<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;
use App\Http\Resources\StatusCode;

class KeranjangController extends Controller
{
    //
    public function getKeranjangs($id_user) {
        $keranjangs = Keranjang::where('id_user',$id_user)->get();
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

    public function getStatus($Now){
        $status = "";
        $arrBulan = array('Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember');
        $arrHari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        $dateForPrice = strtotime('+7 day',$Now);
        $arrDateForPrice = explode('-',date('Y-m-d',$dateForPrice));
        $arrDateForPrice = array_map('intval', $arrDateForPrice);
        $numWeekDay = date('N',$dateForPrice);
        $status = 'jadwal Pengembalian : '.$arrHari[(int) $numWeekDay-1].','.$arrDateForPrice[2].' '.$arrBulan[$arrDateForPrice[1]].' '.$arrDateForPrice[0];
        return $status;
    }

    public function tambahKeranjang(Request $request) {
        date_default_timezone_set("Asia/Jakarta");
        
        // return self::getStatus(time());
        // dd(date('Y-m-d',$dateForPrice));
        $keranjangs = Keranjang::create(array_merge($request->all(),['status' => $this->getStatus(time())]));
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
