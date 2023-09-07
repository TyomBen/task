<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;



Auth::routes();

Route::get('/my_list', [UsersController::class, 'index'])->name('my_app')->middleware('crud');
Route::get('edit/{articles}', [UsersController::class, 'edit'])->name('edit');
Route::put('update/{articles}', [UsersController::class, 'update'])->name('update');
Route::get('create', [UsersController::class, 'create'])->name('create');
Route::get('/delete/{articles}', [UsersController::class, 'destroy'])
->name('delete');
Route::post('/store', [UsersController::class, 'store'])
->name('store');
// Route::post('/crud', [UserController::class, 'user']);
Route::get('classic_user_crud', [UserController::class, 'index'])->name('classic_user');
Route::get('/search', [SearchController::class, 'SearchArticles']);
