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

//User
//get API
Route::get('user','UserController@getUsers');
Route::get('user/{id}','UserController@getUserById');
Route::get('user/byEmail/{email}','UserController@getUserByEmail');

Route::post('addUser','UserController@addUser');

Route::put('updateUser/{id}','UserController@updateUser');

Route::delete('deleteUser/{id}','UserController@deleteUser');
