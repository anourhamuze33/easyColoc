<?php

use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExponsesController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('Authentification')->group(function(){
    Route::get('/colocation/Premier', [ColocationController::class, 'premier'])->name('colocation.premier');
    Route::get('/colocation/form', [ColocationController::class, 'create'])->name('colocation.create');
    Route::post('/colocation/create', [ColocationController::class, 'store'])->name('colocation.store');
    Route::get('/colocation', [ColocationController::class, 'index'])->name('colocation.index');
    
    Route::post('/invite', [InvitationController::class, 'sendInvitation'])->name('colocation.invite');
    Route::post('/joinbycode', [InvitationController::class, 'joinByCode'])->name('joinbycode');
    
    Route::get('/exponse/create', [ExponsesController::class, 'create'])->name('exponse.create');
    Route::post('/exponse/store', [ExponsesController::class, 'store'])->name('exponse.store');
    
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::get('/inscription/form', [UserController::class, 'viewInscription'])->name('user.viewInscription');
Route::post('/inscription', [UserController::class, 'inscription'])->name('user.inscription');

Route::get('/login/form', [UserController::class, 'viewLogin'])->name('user.viewLogin');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

