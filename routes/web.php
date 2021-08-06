<?php

// use App\Http\Controllers\BookCategoryController;

use App\BookCategory;
use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('/demoview','HomeController@demo');
Route::get('getBook/{bookname}', 'AdminController@getBook')->name('getbook');

Route::get('/testUpload','BookController@indexBook')->name('testUpload'); //preview test
Route::post('/uploadImage','BookController@store')->name('uploadImage');
Route::post('/editBuku/{id}','BookController@update')->name('editbuku');

// Route Resources
Route::resource('admin', AdminController::class);
Route::resource('category', BookCategoryController::class);
Route::post('/editCategory/{id}', 'BookCategoryController@update')->name('editcat');
Route::get('cattegory/{id}', function ($id) {
    BookCategory::find($id)->delete();
    return redirect()->route('admin.index');
})->name('deletecat');
Route::get('delleteBook/{id}','AdminController@deleteBook')->name('deletebook');

Route::get('test/{name}',function($name){
    return 'Hello '.$name;
});