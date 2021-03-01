<?php

use App\Http\Controllers\ArrowController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomSymbolController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login',[UserController::class,'login']); //email,password

Route::post('create_room',[RoomController::class,'create']); //id_user,link,name,password
Route::post('delete_room',[RoomController::class,'delete']); //id_room
Route::post('get_room',[RoomController::class,'get']); //link
Route::post('get_rooms',[RoomController::class,'all']);//id_user

Route::post('create_room_symbol',[RoomSymbolController::class,'create']);  //id_room,id_symbol,text,x,y
Route::post('get_room_symbols',[RoomSymbolController::class,'get_room_symbols']); //id_room

Route::post('link',[ArrowController::class,'create']); //id_parent,position_parent,id_child,position_child
Route::post('get_arrows',[ArrowController::class,'get']); //id_room_symbol
