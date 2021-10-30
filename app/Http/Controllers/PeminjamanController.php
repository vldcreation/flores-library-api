<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use App\Http\Resources\StatusCode;
use App\NotifyAdmin;
use App\Peminjaman;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use JavaScript;

class PeminjamanController extends Controller
{
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

    public function getPeminjamans($id_User){
        $data = Peminjaman::where('id_user',$id_User)->get();
        if($data->count() > 0){
            // data available
            return response()->json([
                'data' => $data
            ],StatusCode::http_response_code(200));
        }
        else{
            return response()->json([
                'message' => 'Tidak ada peminjaman'
            ],200);
        }
    }

    public function addPeminjaman(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $data =  Peminjaman::create(array_merge($request->all(),['status' => $this->getStatus(time())]));
        if($data){
            $book = Book::find($request->input('id_buku'));
            if ($book->count() > 0){
                $curJlh = $book->jumlah_buku -= 1;
                $book->update();
            }
            return response()->json([
                'data' => $data,
                'statusCode' => StatusCode::http_response_code(200)
            ],200);
        }
    }

    // Put Mehtod
    public function ubahPeminjaman(Request $request,$id){
        $data = Peminjaman::find($id);
        // return $request->all();
        if($data->count() > 0){
            $data->update($request->all());
            return response()->json([
                'data' => $data,
                'message' => StatusCode::http_response_code(200)
            ],200);
        }else{
            return response()->json([
                'Message' => 'No Loan found'
            ],404);
        }
    }

    public function hapusPeminjaman($id){
        $data = Peminjaman::find($id);
        if($data->count() > 0){
            $data->delete();
            return response()->json([
                'message' => 'Record sucessfully deleted'
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Data not found'
            ],404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $books = Book::where('jumlah_buku','>',0)->get();
         $allbooks = Book::all();
         $categorys = BookCategory::all();
         $members = User::where('role',3)->with('_peminjamans')->has('_peminjamans')->get();
         $allMembers = User::where('role',3)->get();
        //  dd($members);
         $roles = Role::all();
         $peminjamans = Peminjaman::all();
         $notifyAdmins = NotifyAdmin::all();
         $memberHasNotif = User::with('_notifymembers')->has('_notifymembers')->get();
        //  dd($membershavenotif);
         // $laonUsers = User::where('id',3)->first()->_peminjamans->count();
         // dd($laonUsers);
         return view('loan.index',['books' => $books,'members' => $members,
         'categorys' => $categorys,'roles' => $roles,'peminjamans' => $peminjamans,'notifyAdmins' => $notifyAdmins,
         'allbooks' => $allbooks,'memberHasNotif'=> $memberHasNotif,'allMembers' => $allMembers
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        date_default_timezone_set("Asia/Jakarta");
            $book = Book::findOrFail($request->input('id_buku'));
            if ($book->count() > 0){
                $data =  Peminjaman::create(array_merge($request->all(),['status' => $this->getStatus(time())]));
                $curJlh = $book->jumlah_buku -= 1;
                $book->update();
            }
            else{
                redirect()->back()->with('failed','Buku sedang dipinjam');
            }
            return redirect()->back()->with('success_added','Success Added Book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $member = User::where('id' , $id)->where('role',3)->first();
		if(!$member)
			abort(404);
        // dd($member);
        $notifyAdmins = NotifyAdmin::all();
        if($request->segment(4) == 'returned')
            return view('user.detail-returned',compact(['member','notifyAdmins']));
        return view('user.detail',compact(['member','notifyAdmins']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function returnB($id){
        $peminjaman = Peminjaman::find($id);
        // dd($peminjaman);
        $book = Book::find($peminjaman->id_buku);
        $peminjaman->delete();
        $book->jumlah_buku += 1;
        $book->save();
        return redirect()->back();
    }
}
