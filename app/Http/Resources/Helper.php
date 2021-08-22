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
            return (($getMinute/60) > 1) ? floor(($getMinute/60)).' hours' : floor(($getMinute/60)).' hour';
        }
        return (($getMinute/self::DATE_DEADLINE_2) > 1) ? floor(($getMinute/self::DATE_DEADLINE_2)).' days' : floor(($getMinute/self::DATE_DEADLINE_2)).' day';
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
        $min_days = 3; //assume max day left = 2
        $getDif = self::getDifferenceDate($loan_date);
        // @use literally when load data peminjamans , so don't use literaly foreach to this
        // return function : void
        // $peminjamans = DB::table('peminjaman as p')
        // ->where(DB::raw('DATEDIFF(p.jadwal_kembali, now())'),'<' ,$min_days)->get();
        // dd($peminjamans);
        if(date_diff(new DateTime('now'),new Datetime($loan_date))->d < $min_days) // loan return have 2 more days left
            self::sendNotification($id_member,$getDif,$loan_id);
    }

    public static function sendNotification($id_member,$getDif,$loan_id){
        $how_long = 0;
        $short_desc = '';$judul = '';
        $peminjamans = Peminjaman::find($loan_id)->firstOrFail();
        if($getDif <= self::DATE_DEADLINE_1 && $getDif > self::DATE_DEADLINE_2){
            //2 days left
            $how_long = 2;
            if($peminjamans->deadline_1 == true)
                return;
            $short_desc = 'Peringatan pengembalian Buku '.$how_long.' hari lagi';
            $judul =  User::where('id',$id_member)->first()->only('name')['name'];
            NotifyAdmin::create([
                'id_member' => $id_member,
                'judul' => $judul,
                'deskripsi_singkat' => $short_desc,
                'slug' => Str::slug('notify-'.$judul)
            ]);
            $peminjamans->deadline_1 = true;
            $peminjamans->save();
        }
        else if($getDif <= self::DATE_DEADLINE_2 && $getDif > self::DATE_DEADLINE_LAST){
            //1 day left
            $how_long = 1;
            if($peminjamans->deadline_2 == true)
                return;
            $short_desc = 'Peringatan pengembalian Buku '.$how_long.' hari lagi';
            $judul =  User::where('id',$id_member)->first()->only('name')['name'];
            NotifyAdmin::create([
                'id_member' => $id_member,
                'judul' => $judul,
                'deskripsi_singkat' => $short_desc,
                'slug' => Str::slug('notify-'.$judul)
            ]);
            $peminjamans->deadline_2 = true;
            $peminjamans->save();
        }
        else if($getDif <= self::DATE_DEADLINE_LAST){
            //late
            $how_long = 0;
            if(Peminjaman::find($loan_id)->firstOrFail()->last_deadline == true)
                return;
            $short_desc = 'Peringatan pengembalian Buku '.$how_long.' hari lagi';
            $judul =  User::where('id',$id_member)->first()->only('name')['name'];
            NotifyAdmin::create([
                'id_member' => $id_member,
                'judul' => $judul,
                'deskripsi_singkat' => $short_desc,
                'slug' => Str::slug('notify-'.$judul)
            ]);
            $peminjamans->last_deadline = true;
            $peminjamans->save();
        }
    }

    public static function getRating($id_buku){
       return (new ReviewController)->getBookRating($id_buku);
    }
}