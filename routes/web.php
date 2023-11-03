<?php

use App\Http\Controllers\CertificateController;
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
    Route::get('indosat/webinarAll', [IndosatAuthController::class, 'webinarAll'])->name('indosat.webinarAll');
    Route::get('indosat/webinar/details/{id}', [IndosatAuthController::class, 'webinarDetails'])->name('indosat.webinar.details');
    Route::post('indosat/webinar/confirm', [IndosatAuthController::class, 'werbinarConfirm'])->name('indosat.webinar.confirm');
    Route::post('indosat/sync/preference', [IndosatAuthController::class, 'syncPreference'])->name('indosat.sync.preference');
    // webinar credit
    Route::get('/filter-credit', [IndosatAuthController::class, 'filterCreditAjax'])->name('filter.credit');
    // logout
    Route::get('indosat/logout', [IndosatAuthController::class, 'logout'])->name('indosat.logout');

    // certificate
    Route::get('indosat/certificate', [CertificateController::class, 'certificate'])->name('indosat.certificate');
    Route::post('indosat/certificate/unlock', [CertificateController::class, 'unlockCertificate'])->name('indosat.certificate.unlock');
    Route::get('indosat/certificate/{event_id}/{indosat_user_id}/preview', [CertificateController::class, 'preview'])->name('indosat.certificate.preview');
    Route::get('indosat/certificate/{event_id}/{indosat_user_id}/download', [CertificateController::class, 'download'])->name('indosat.certificate.download');
});


Route::view('indosat_certificate_empty', 'indosat_certificate_empty');
Route::view('indosat_express_tab_before_ques', 'indosat_express_tab_before_ques');
