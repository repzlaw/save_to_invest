<?php

use App\Http\Controllers\Auth\ProfileController;
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
    Route::get('/test', [HomeController::class, 'test']);
    Route::get('/profile/{user_id?}', [ProfileController::class, 'index'])->name('profile');
});

