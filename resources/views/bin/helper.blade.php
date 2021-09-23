<?php

use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ReviewController;
use App\Http\Resources\Helper;

date_default_timezone_set("Asia/Jakarta");
$date1 = new DateTime('now');
$date2 = new DateTime($peminjamans->jadwal_kembali);

$diff = $date2->diff($date1);

$hours = $diff->h;
$hours = $hours + ($diff->days*24);
$res = $diff->i +($hours*60);
// dd($diff);
// echo $res;
echo Helper::checkLoan('2021-08-23',4,1);
// Helper::getRemaningTime('2021-08-22 12:29:31');
// echo (new ReviewController)->getBookRating(1)['title'];
// echo Helper::getRating(1)['rating'];