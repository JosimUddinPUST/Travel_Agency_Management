<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;

Route::get('/', function () {
    // return view('just_check');
    return view('welcome');
});

//Admin
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminAuthController::class,'login'])->name('admin_login');

    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin_dashboard');
});
