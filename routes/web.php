<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

/* Route::get('/', function () {
    return view('pages/blank-page',  ['type_menu' => '']);
}); */
// di tutup krd pakai fortify
/* Route::get('/', function () {
    return view('pages.app.dashboard-siakad',  ['type_menu' => '']);
})->name('register');

Route::get('/login', function () {
    return view('pages.auth.auth-login',  ['type_menu' => '']);
})->name('login');

Route::get('/register', function () {
    return view('pages.auth.auth-register',  ['type_menu' => '']);
})->name('register');
Route::get('/forgot', function () {
    return view('pages.auth.auth-forgot-password',  ['type_menu' => '']);
})->name('forgot');
Route::get('/reset-password', function () {
    return view('pages.auth.auth-reset-password',  ['type_menu' => '']);
})->name('reset-password');
 */
Route::get('/', function () {
    return view('pages.auth.auth-login');
});

 Route::middleware(['auth'])->group(function(){
    Route::get('home', function(){
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
       
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::get('generate-qrcode/{schedule}', [ScheduleController::class, 'generateQrCode'])->name('generate-qrcode');
    Route::put('generate-qrcode-update/{schedule}', [ScheduleController::class, 'generateQrCodeUpdate'])->name('generate-qrcode-update');
 });

  