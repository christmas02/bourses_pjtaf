<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\CandidatureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|*/
Route::get('/', function () {
    return view('frontend.index');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('connexion', 'index')->name('connexion');
    Route::post('authentification', 'login')->name('login');

    Route::get('verifyEmail', 'verifyEmail')->name('verifyEmail');
    Route::post('/verificationEmail', 'sendmailforResetPassword')->name('sendmailforResetPassword');
    Route::get('/reset-password/{user_id}', 'showResetForm')->name('password.reset');
    Route::post('updatePassword', 'saveNewPassword')->name('saveNewPassword');

    Route::get('/nouveau_mot_de_passe/{identifiant_user}', 'nouveauMP')->name('nouveauMP');

    Route::get('/confirmation/{user_id}/{token}', 'confirm')->name('confirmCompte');

    Route::get('deconnexion', 'logout');
});

Route::prefix('candidature')
    ->controller(CandidatureController::class)
    ->group(function () {

        Route::get('candidature', 'index')->name('candidature');
        Route::post('/candidature', 'saveCandidature')->name('saveCandidature');

        Route::get('/notification-candidature', 'notifCandidature')->name('notifCandidature');
        Route::get('/notification-update-candidature', 'notifUpdateCandidature')->name('notifUpdateCandidature');
    });


Route::group(['middleware' => 'auth'], function () {
    Route::controller(CandidatureController::class)->group(function () {
        Route::get('/cloture-des-candidatures', 'cloture')->name('cloture');
        Route::get('/formUpdate-candidature', 'FormUpdateCandidature')->name('FormUpdateCandidature');
        Route::post('/update_candidature', 'updateCandidature')->name('updateCandidature');

        Route::post('updateIndoUser', 'updateIndoUser')->name('updateIndoUser');
    });
});
