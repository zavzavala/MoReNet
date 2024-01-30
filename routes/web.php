<?php

use App\Models\empresa;
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
Route::view('/login', 'back.pages.auth.login')->name('login');
Route::get('/', function () {
    return redirect()->route('login');
   // return view('welcome');
});

Route::get('/search',function () {
    //$empresas = empresa::all();
    $empresas = empresa::where('empresa')->get();
    return $empresas;
});