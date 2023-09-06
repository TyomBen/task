<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;



Auth::routes();

Route::get('/my_list', [UsersController::class, 'index'])->name('my_app')->middleware('crud');
Route::get('edit/{user}', [UsersController::class, 'edit'])->name('edit');
Route::put('update', [UsersController::class, 'update'])->name('update');
Route::get('/create', [UsersController::class, 'create'])
->name('create');
Route::post('/store', [UsersController::class, 'store'])
->name('store');
// Route::post('/crud', [UserController::class, 'user']);
Route::get('classic_user_crud', function () {
    return view('classic_user_crud');
})->name('classic_user');
