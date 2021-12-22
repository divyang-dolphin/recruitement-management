<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

//main
Route::get('/index', function () {
   // return view('backend.dashboard.index');
   return view('backend.layout.index');
});

//forms
Route::get('/form', function () {
    return view('backend.candidate.create');
});
//tables
Route::get('/table', function () {
    return view('backend.candidate.index');
});


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
