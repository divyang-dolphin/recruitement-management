<?php

use App\Http\Controllers\CandidateCommentController;
use App\Http\Controllers\CandidateController;
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
// Route::get('/form', function () {
//     return view('backend.candidate.create');
// });
//tables
// Route::get('/table', function () {
//     return view('backend.candidate.index');
// });


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('candidate',CandidateController::class);

    Route::get('candidate-comment/{candidate}', [CandidateCommentController::class, 'index'])->name('candidate-comment.index');
    Route::post('candidate-comment/store/{candidate}', [CandidateCommentController::class, 'store'])->name('candidate-comment.store');
    Route::resource('candidate-comment',CandidateCommentController::class)->except('index');
});
