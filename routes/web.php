<?php

use App\Http\Controllers\IndosatAuthController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/webinar_new', function () {
    return view('indosat_webinar_new');
});
Route::get('/webinar_details', function () {
    return view('indosat_webinar_details');
});


Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::group(['middleware' => ['guest:indosat_user']], function () {
    Route::get('indosat/login', [IndosatAuthController::class, 'loginView'])->name('indosat.login');
    Route::post('indosat/login', [IndosatAuthController::class, 'login'])->name('indosat.login');
    Route::get('indosat/signup', [IndosatAuthController::class, 'signupView'])->name('indosat.signup');
    Route::post('indosat/signup', [IndosatAuthController::class, 'signup'])->name('indosat.signup');
});

Route::group(['middleware' => ['auth:indosat_user']], function () {
    Route::get('indosat/webinar', [IndosatAuthController::class, 'webinar'])->name('indosat.webinar');
    Route::get('indosat/webinar/details', [IndosatAuthController::class, 'webinarDetails'])->name('indosat.webinar.details');
    Route::get('indosat/logout', [IndosatAuthController::class, 'logout'])->name('indosat.logout');
});
