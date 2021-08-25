<?php
namespace App\Http\Resources;

use App\Http\Controllers\ReviewController;
use App\NotifyAdmin;
use App\Peminjaman;
use Illuminate\Support\Str;
use App\User;
use DateTime;

class Helper{
    public const DATE_DEADLINE_1 = 2880;
    public const DATE_DEADLINE_2 = 1440;
    public const DATE_DEADLINE_LAST = 0;

    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    public static function getRemaningTime($dataDate){
        $date1 = new DateTime($dataDate);
        $date2 = new DateTime('now');
        
        $diff = $date2->diff($date1);
        // dd($diff);
        $getMinute = ($diff->days*24*60) + ($diff->h*60) + $diff->i;
        // dd($getMinute);
        if($getMinute <= 60){
            return $getMinute.' min';
        }
        else if($getMinute <= self::DATE_DEADLINE_2){
            return (floor($getMinute/60) > 1) ? floor(($getMinute/60)).' hours' : floor(($getMinute/60)).' hour';
        }
        return (floor($getMinute/self::DATE_DEADLINE_2) > 1) ? floor(($getMinute/self::DATE_DEADLINE_2)).' days' : floor(($getMinute/self::DATE_DEADLINE_2)).' day';
    }

    public static function getDifferenceDate($loan_date){
        date_default_timezone_set("Asia/Jakarta");
        $date1 = new DateTime('now');
        $date2 = new DateTime($loan_date);

        $diff = $date2->diff($date1);

        $hours = $diff->h;
        $hours = round(($hours + ($diff->days*24)),2);
        $minute = $diff->i;
        return $minute + ($hours*60);
    }

    public static function checkLoan($loan_date,$id_member,$loan_id){
        $date1_ts = strtotime(date('Y-m-d'));
        $date2_ts = strtotime($loan_date);
        $diff = $date2_ts - $date1_ts;
        $min_days = 3; //assume max day left = 2

        if(floor($diff/(60*60*24)) < $min_days) // loan return have 2 more days left
            self::sendNotification($id_member,floor($diff/(60*24)),$loan_id);
    }

    public static function sendNotification($id_member,$getDif,$loan_id){
        $short_desc = '';$judul = '';
        $how_long = floor($getDif/60);
        $peminjamans = Peminjaman::find($loan_id)->firstOrFail();
            //2 days left
            if(($how_long == 2 && $peminjamans->deadline_1 == true) || ($how_long == 1 && $peminjamans->deadline2 == true) || ($how_long == 0 && $peminjamans->last_deadline == true) || ($peminjamans->deadline1 || $peminjamans->deadline2 || $peminjamans->last_deadline)) // Skip if have send notifications
                return;
            if($how_long > 0)
                $short_desc = 'Peringatan pengembalian Buku '. $peminjamans->_book()->first()->barcode .' '.$how_long.' hari lagi';
            else if($how_long == 0)
                $short_desc = 'Hari terakhir pengembalian buku '. $peminjamans->_book()->first()->barcode;
            else
                $short_desc = 'Terlambat '.abs($how_long).' hari mengembalikan buku'. $peminjamans->_book()->first()->barcode;
            $judul =  User::where('id',$id_member)->first()->only('name')['name'];
            NotifyAdmin::create([
                'id_member' => $id_member,
                'judul' => $judul,
                'deskripsi_singkat' => $short_desc,
                'slug' => Str::slug('notify-'.$judul)
            ]);
            if($how_long == 2)
                $peminjamans->deadline_1 = true;
            else if($how_long == 1)
                $peminjamans->deadline_2 = true;
            else if($how_long == 0)
                $peminjamans->last_deadline = true;
            else{
                $peminjamans->deadline_1 = true;
                $peminjamans->deadline_2 = true;         //okay , now deadline was late , set true all notif indicator
                $peminjamans->last_deadline = true;
            }
            $peminjamans->save();
    }

    public static function getRating($id_buku){
       return (new ReviewController)->getBookRating($id_buku);
    }
}