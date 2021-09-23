<?php

namespace App\Http\Controllers;

use App\Http\Resources\Helper;
use App\NotifyAdmin;
use App\NotifyMember;
use App\Peminjaman;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifyController extends Controller
{
    //
    public function sendToMember(Request $request){
        $data = [
            'id_user' => $request->id_user,
            'deskripsi_panjang' => $request->deskripsi_panjang
        ];
        // dd($data);
        NotifyMember::create($data);
        return redirect()->back();
    }

    public function deleteNotification(Request $request,$id){
        $data = NotifyMember::find($id);
        $data->delete();
        return redirect()->back();
    }
    
}
