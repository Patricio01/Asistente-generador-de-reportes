<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/',[Controller::class,'index'])->name('index');
Route::get('/paso1',[Controller::class,'paso1'])->name('paso1');
Route::get('/paso2',[Controller::class,'paso2'])->name('paso2');
Route::get('/paso21',[Controller::class,'paso21'])->name('paso21');
Route::get('/paso3',[Controller::class,'paso3'])->name('paso3');
Route::get('/all',[Controller::class,'all']);
