<?php

use App\Http\Controllers\CVBuilderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignUpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register',[SignUpController::class,'register'])->name('user.register');


Route::post('login',[LoginController::class,'login'])->name('user.login');
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('profile/{id}',[ProfileController::class,'store'])->name('user.profile');
//     Route::post('cv-builder',[CVBuilderController::class,'store'])->name('user.cv');
//     Route::get('dashboard/{id}',[DashboardController::class,'show'])->name('user.dashboard');
// }); 
// Route::middleware('auth:api')->group( function () {
    // Route::resource('products', ProductController::class);
    // });
    Route::post('profile/{id}',[ProfileController::class,'store'])->name('user.profile');
    Route::post('cv-builder',[CVBuilderController::class,'store'])->name('user.cv');
    Route::get('dashboard/{id}',[DashboardController::class,'show'])->name('user.dashboard');