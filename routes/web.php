<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminWelcomeItemController;
use App\Http\Controllers\Admin\AdminFeatureController;


Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/blog',[FrontController::class,'blog'])->name('blog');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/faq',[FrontController::class,'faq'])->name('faq');
Route::get('/team-members',[FrontController::class,'team_members'])->name('team_members');
Route::get('/destinations',[FrontController::class,'destinations'])->name('destinations');
Route::get('/packages',[FrontController::class,'packages'])->name('packages');

Route::prefix('user')->group(function () {
Route::get('/registration',[FrontController::class,'registration'])->name('user_registration');
Route::post('/registration',[FrontController::class,'registration_submit'])->name('user_registration_submit');
Route::get('/registration-verify-email/{email}/{token}',[FrontController::class,'registration_verify_email'])->name('user_registration_verify_email');

Route::get('/login',[FrontController::class,'login'])->name('user_login');
Route::post('/login',[FrontController::class,'login_submit'])->name('user_login_submit');
Route::get('/logout',[FrontController::class,'logout'])->name('user_logout');


Route::get('/forget-password',[FrontController::class,'forget_password'])->name('user_forget_password');
Route::post('/forget-password',[FrontController::class,'forget_password_submit'])->name('user_forget_password_submit');

Route::get('/reset-password/{email}/{token}',[FrontController::class,'reset_password'])->name('user_reset_password');
Route::post('/reset-password/{email}/{token}',[FrontController::class,'reset_password_submit'])->name('user_reset_password_submit');

Route::get('/profile',[UserController::class,'profile'])->name('user_profile');
Route::post('/profile',[UserController::class,'profile_submit'])->name('user_profile_submit');


});


//User
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('user_dashboard');

});


//Admin
Route::middleware('admin')->prefix('admin')->group(function (){

    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin_dashboard');
    Route::get('/profile',[AdminAuthController::class,'profile'])->name('admin_profile');    
    Route::post('/profile',[AdminAuthController::class,'profile_submit'])->name('admin_profile_submit');   
    //Slider
    Route::get('/slider/index',[AdminSliderController::class,'index'])->name('admin_slider_index');
    Route::get('/slider/create',[AdminSliderController::class,'create'])->name('admin_slider_create');
    Route::post('/slider/create',[AdminSliderController::class,'create_submit'])->name('admin_slider_create_submit');
    Route::get('/slider/delete',[AdminSliderController::class,'delete'])->name('admin_slider_delete');
    Route::get('/slider/edit/{id}',[AdminSliderController::class, 'edit'])->name('admin_slider_edit');
    Route::post('/slider/edit/{id}',[AdminSliderController::class,'edit_submit'])->name('admin_slider_edit_submit');
    Route::get('/slider/delete/{id}',[AdminSliderController::class, 'delete'])->name('admin_slider_delete');
    
    //Welcome Item
    Route::get('/welcome-item/edit',[AdminWelcomeItemController::class,'edit'])->name('admin_welcome_item_edit');
    Route::post('/welcome-item/edit',[AdminWelcomeItemController::class,'edit_submit'])->name('admin_welcome_item_edit_submit');

    //Feature
    Route::get('/feature/index',[AdminFeatureController::class,'index'])->name('admin_feature_index');
    Route::get('/feature/create',[AdminFeatureController::class,'create'])->name('admin_feature_create');
    Route::post('/feature/create',[AdminFeatureController::class,'create_submit'])->name('admin_feature_create_submit');
    Route::get('/feature/edit/{id}',[AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('/feature/edit/{id}',[AdminFeatureController::class,'edit_submit'])->name('admin_feature_edit_submit');
    Route::get('/feature/delete/{id}',[AdminFeatureController::class, 'delete'])->name('admin_feature_delete');

});
//Admin
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminAuthController::class,'login'])->name('admin_login');
    Route::post('/login',[AdminAuthController::class,'login_submit'])->name('admin_login_submit');
    Route::get('/logout',[AdminAuthController::class,'logout'])->name('admin_logout');
   
    Route::get('/forget-password',[AdminAuthController::class,'forget_password'])->name('admin_forget_password');

    Route::post('/admin-forget-password-submit',[AdminAuthController::class,'forget_password_submit'])->name('admin_forget_password_submit');

    Route::get('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password'])->name('admin_reset_password');

    Route::post('/reset-password/{token}/{email}',[AdminAuthController::class,'reset_password_submit'])->name('admin_reset_password_submit');

});
