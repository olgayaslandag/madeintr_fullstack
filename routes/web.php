<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Client\Tag\TagController;
use App\Http\Controllers\Client\Company\CompanyController;
use App\Http\Controllers\Client\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
})->withoutMiddleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(CompanyController::class)->group(function() {
    Route::group(['prefix' => 'company'], function() {
        Route::get('/', 'index')->name('company.all');
        Route::get('form', 'form')->name('company.form');
        Route::get('{id}', 'get')->name('company.get');
    });
});

Route::controller(TagController::class)->group(function() {
    Route::get('/tag', 'index')->name('tag.all');
    Route::get('/tag/{id}', 'get')->name('tag.get');
});
