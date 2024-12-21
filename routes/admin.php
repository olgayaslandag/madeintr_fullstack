<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('admin');





Route::controller(CompanyController::class)->group(function(){
    Route::get('/companies', 'index')->name('company.all');
    Route::get('/company/new', 'create')->name('company.create');
    Route::get('/company/edit/{id}', 'form')->name('company.edit');
    Route::delete('/company/delete/{id}', 'delete')->name('company.delete');
    Route::post('/company/store', 'store')->name('company.store');
});
