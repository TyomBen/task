<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/my_list', [UserController::class, 'user']);

Auth::routes();

Route::get('/my_list', [UserController::class, 'user'])->name('my_app')->middleware('crud');
// Route::post('/crud', [UserController::class, 'user']);
Route::get('classic_user_crud', function () {
    return view('classic_user_crud');
})->name('classic_user');
