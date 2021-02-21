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
Route::get('/viewUser/edit', 'register_controller@edit');
Route::get('/viewUser/delete', 'register_controller@delete');
Route::get('/search', 'register_controller@search');
