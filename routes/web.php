<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Client\Company\CompanyController;
use App\Http\Controllers\Client\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function() {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('loginPost');
})->withoutMiddleware('auth');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/company/form', [CompanyController::class, 'form'])->name('companyForm');
