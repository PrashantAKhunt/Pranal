<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kankupagla', [HomeController::class, 'kanKuPagla'])->name('kanKuPagla');
Route::get('/engagement', [HomeController::class, 'engagement'])->name('engagement');
Route::post('/download-mp3', [HomeController::class, 'downloadMp3'])->name('download-mp3');



