<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador;
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

//Ruta del controlador con la función que llama la info
Route::get('/',[Controlador::class,'index']);