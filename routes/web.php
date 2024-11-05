<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cdigitalsk;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cdashboard;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {
	Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
    Route::get('/dashboard', [Cdashboard::class, 'index'])->name('dashboard');



Route::middleware(['cek_level:admin'])->group(function () {
    Route::resource('digitalsk2', Cdigitalsk::class);
});


});