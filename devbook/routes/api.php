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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/createUser', 'register_controller@create');
Route::get('/viewUser', 'register_controller@view');
Route::post('/viewUser/edit', 'register_controller@edit');
Route::post('/viewUser/delete', 'register_controller@destroy');
Route::post('/search', 'register_controller@search');
Route::get('send', 'userController@loginCheck');

