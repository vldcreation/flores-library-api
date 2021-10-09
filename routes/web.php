<?php

// use App\Http\Controllers\BookCategoryController;

use App\BookCategory;
use App\Peminjaman;
use App\TokenApi;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AuthController@index');
Route::get('/demoview','HomeController@demo');
Route::get('getBook/{bookname}', 'AdminController@getBook')->name('getbook');

Route::get('/testUpload','BookController@indexBook')->name('testUpload'); //preview test
Route::post('/uploadImage','BookController@store')->name('uploadImage');
Route::post('/editBuku/{id}','BookController@update')->name('editbuku');

// Route Resources
// Route::resource('admin', AdminController::class);
Route::get('books/{id}', 'BookController@show')->name('loadDetail');
Route::resource('category', BookCategoryController::class);
Route::post('/editCategory/{id}', 'BookCategoryController@update')->name('editcat');
Route::resource('users', UserController::class);
Route::post('/editMember/{id}', 'UserController@update')->name('editmember');
Route::get('deleteMember/{id}', function ($id) {
    User::find($id)->delete();
    return redirect()->route('admin.index');
})->name('deleteMember');
Route::get('cattegory/{id}', function ($id) {
    BookCategory::find($id)->delete();
    return redirect()->route('admin.index');
})->name('deletecat');
Route::get('delleteBook/{id}','AdminController@deleteBook')->name('deletebook');

Route::get('test/{name}',function($name){
    return 'Hello '.$name;
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('storage/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = storage_path('app/public/user/' . $filename);
    $path2 = storage_path('app/public/file-image/' . $filename);

    if (!File::exists($path)) {
        // dd($path);
        $path = $path2;
        if(!File::exists($path)){
            abort(404,'File Not Found');
        }
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);

    $response->header("Content-Type", $type);

    return $response;
})->name('getimg');

Route::group(['middleware' => ['auth','isAdmin']],function () {
    Route::get('generate-api',function(){
        $tokenApi = TokenApi::first();
        $tokenApi->api_key = Str::random(255);
        $tokenApi->save();
        return response()->json([
            'message' => 'Success',
            'data' => TokenApi::first()
        ],200);
    });
    Route::get('get-api',function(){
        return response()->json([
            'message' => 'Success',
            'data' => TokenApi::first()
        ],200);
    });
    Route::get('helper', function () {
        $id = 4;
        $peminjamans = Peminjaman::where('id_user',$id)->firstOrFail();
        return view('bin.helper',compact('peminjamans'));
    });
    Route::prefix('admin')->group(function () {
        Route::get('/{index?}', 'AdminController@index')->name('admin.index')->where('index','index');
        Route::prefix('loan')->group(function () {
            Route::get('/{index?}','PeminjamanController@index')->name('admin.loan.index')->where('index','index');
            Route::get('/detail/{id}','PeminjamanController@show')->name('admin.loan.detail');
            Route::get('/detail/{id}/return','PeminjamanController@returnB')->name('admin.loan.return');
            Route::post('/postNotify','NotifyController@sendToMember')->name('admin.loan.notifymember');
            Route::get('/deleteNotify/{id}','NotifyController@deleteNotification')->name('admin.loan.deleteNotify');
            Route::post('store','PeminjamanController@store')->name('admin.loan.store');
        });
        Route::prefix('settings')->group(function () {
            Route::get('index','SettingsController@index')->name('admin.settings.index');
            Route::get('edit','SettingsController@edit')->name('admin.settings.edit');
            Route::post('update','SettingsController@update')->name('admin.settings.update');
        });
    });
});

Route::prefix('auth')->group(function () {
    Route::get('login', 'AuthController@index')->name('auth.login');
    Route::post('login', 'AuthController@validasi')->name('auth.validasi');
    Route::post('logout', 'AuthController@logout')->name('auth.logout');
});