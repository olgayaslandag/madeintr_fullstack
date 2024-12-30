<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('admin');


Route::controller(CompanyController::class)->group(function(){
    Route::get('/companies', 'index')->name('company.all');
    Route::get('/company/new', 'create')->name('company.create');
    Route::get('/company/edit/{id}', 'edit')->name('company.edit');
    Route::delete('/company/delete/{id}', 'delete')->name('company.delete');
    Route::post('/company/store', 'store')->name('company.store');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/users', 'index')->name('user.all');
    Route::get('/user/new', 'create')->name('user.create');
    Route::get('/user/edit/{id}', 'edit')->name('user.edit');
    Route::delete('/user/delete/{id}', 'delete')->name('user.delete');
    Route::post('/user/store', 'store')->name('user.store');
});

Route::controller(TagController::class)->group(function() {
    Route::get('/tags', 'index')->name('tag.all');
});
