<?php

use App\Http\Controllers\Admin\Ai\AiController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('admin');


Route::name('admin.')->group(function () {
    Route::prefix('company')->controller(CompanyController::class)->group(function(){
        Route::get('/', 'index')->name('company.all');
        Route::get('new', 'create')->name('company.create');
        Route::get('edit/{id}', 'edit')->name('company.edit');
        Route::delete('delete/{id}', 'delete')->name('company.delete');
        Route::post('store', 'store')->name('company.store');
    });

    Route::prefix('user')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('user.all');
        Route::get('new', 'create')->name('user.create');
        Route::get('edit/{id}', 'edit')->name('user.edit');
        Route::delete('delete/{id}', 'delete')->name('user.delete');
        Route::post('store', 'store')->name('user.store');
    });

    Route::prefix('tag')->controller(TagController::class)->group(function() {
        Route::get('/', 'index')->name('tag.all');
        Route::get('new', 'create')->name('tag.create');
        Route::get('edit/{id}', 'edit')->name('tag.edit');
        Route::delete('delete/{id}', 'delete')->name('tag.delete');
        Route::post('store', 'store')->name('tag.store');
    });

    Route::prefix('ai')->controller(AiController::class)->group(function() {
        Route::get('/', 'index')->name('ai.all');
        Route::get('form', 'form')->name('ai.form');
        Route::post('store', 'store')->name('ai.store');
        Route::post('ask', 'ask')->name('ai.ask');
    });
});
