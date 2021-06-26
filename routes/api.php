<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Role
Route::get('roles','RoleController@getRoles');
Route::get('role/{id}','RoleController@getRoleById');

Route::post('addRole','RoleController@addRole');

Route::put('updateRole/{id}','RoleController@updateRole');

Route::delete('deleteRole/{id}','RoleController@deleteRole');

//User
Route::get('users','UserController@getUsers');
Route::get('user/{id}','UserController@getUserById');
Route::get('user/byEmail/{email}','UserController@getUserByEmail');

Route::post('addUser','UserController@addUser');

Route::put('updateUser/{id}','UserController@updateUser');

Route::delete('deleteUser/{id}','UserController@deleteUser');

//Atuhtentication
Route::post('auth/login','AuthController@login');

//Book Category
Route::get('categorys','BookCategoryController@getCategorys');
Route::get('category/{id}','BookCategoryController@getCategoryById');

Route::post('addCategory','BookCategoryController@addCategory');

Route::put('updateCategory/{id}','BookCategoryController@updateCategory');

Route::delete('deleteCategory/{id}','BookCategoryController@deleteCategory');

//Book
Route::get('books','BookController@getBooks');
Route::get('book/{id}','BookController@getBookById');

Route::post('addBook','BookController@addBook');

Route::put('updateBook/{id}','BookController@updateBook');

Route::delete('deleteBook/{id}','BookController@deleteBook');

// Book Review
Route::get('reviews','ReviewController@getReviews');
Route::get('review/book/{id_buku}','ReviewController@getBookRating'); //get rating by id book
Route::get('review/{id}','ReviewController@getReviewById');

Route::post('addReview','ReviewController@addReview');

Route::put('updateReview/{id}','ReviewController@updateReview');

Route::delete('deleteReview/{id}','ReviewController@deleteReview');

// Pengumuman 
Route::get('pengumamans','PengumumanController@getPengumuman');
Route::get('pengumuman/{id}','PengumumanController@getPengumumanById');
Route::post('tambahPengumuman','PengumumanController@tambahPengumuman');
Route::put('ubahPengumuman/{id}','PengumumanController@ubahPengumuman');
Route::delete('hapusPengumuman/{id}','PengumumanController@hapusPengumuman');
