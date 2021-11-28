<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\GeneralFunctionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Setup\SetupController;
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

    Route::middleware(['verified'])->group(function () {

    });

    Route::middleware(['auth'])->group(function () {
        // Route::get('/', function () {
        //     // return inertia('Home');
        // });
        Route::get('/', [HomeController::class, 'dashboard']);
        Route::get('/get-states', [GeneralFunctionsController::class, 'getState'])->name('get-states');
        Route::get('/get-lgas/{id}', [GeneralFunctionsController::class, 'getLgas'])->name('get-lgas');
        Route::prefix('/banks')->name('banks.')->group(function () {
            Route::get('/', [BankController::class, 'getBanks'])->name('all');
            Route::post('/get-withdrawal-details', [BankController::class, 'getWithdrawalBank'])->name('get-withdrawal-details');
            Route::post('/save-withdrawal-bank-details', [BankController::class, 'saveWithdrawalBank'])->name('save-withdrawal-bank-details');
            Route::post('/resolve-account', [BankController::class, 'resolveAccount'])->name('resolve-account');
        });
        //user profile routes
        Route::prefix('/profile')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/update', [ProfileController::class, 'updateProfile'])->name('edit')->middleware(['verified']);
            Route::post('/update-image', [UserProfileController::class, 'updateImage'])->name('edit.image')->middleware(['verified']);
            Route::post('/verify-email', [ProfileController::class,'verifyEmail'])->name('verify-email');
            Route::post('/get-user', [ProfileController::class,'getUser'])->name('get-user');
            
            //change password
            Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('change-password')->middleware(['verified']);
            Route::get('/change-password/verify', [UserTwoFactorController::class, 'passwordTwoFaIndex'])->name('verify.change-password')->middleware(['verified']);
            Route::post('/password-token-verify', [UserTwoFactorController::class, 'verifyPassword'])->name('password-token.confirm')->middleware(['verified']);
            Route::get('/password-resend-token', [UserTwoFactorController::class, 'resendPasswordToken'])->name('token.resend')->middleware(['verified']);
    });
});

