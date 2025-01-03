<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminWelcomeItemController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminCounterItemController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminBlogCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminPackageController;



Route::get('/',[FrontController::class,'home'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/blog',[FrontController::class,'blog'])->name('blog');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/faq',[FrontController::class,'faq'])->name('faq');
Route::get('/team-members',[FrontController::class,'team_members'])->name('team_members');
Route::get('/team-member-details/{id}',[FrontController::class,'team_member_details'])->name('team_member_details');

Route::get('/destinations',[FrontController::class,'destinations'])->name('destinations');
Route::get('/destination-details/{slug}',[FrontController::class,'destination_details'])->name('destination_details');
Route::get('/packages',[FrontController::class,'packages'])->name('packages');

Route::get('/post-details/{slug}',[FrontController::class,'post_details'])->name('post_details');

Route::get('/blog-category/{slug}',[FrontController::class,'blog_category'])->name('blog_category');





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

    //Counter Item
    Route::get('/counter-item/edit',[AdminCounterItemController::class,'edit'])->name('admin_counter_item_edit');
    Route::post('/counter-item/edit',[AdminCounterItemController::class,'edit_submit'])->name('admin_counter_item_edit_submit');

    //Testimonial
    Route::get('/testimonial/index',[AdminTestimonialController::class,'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create',[AdminTestimonialController::class,'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/create',[AdminTestimonialController::class,'create_submit'])->name('admin_testimonial_create_submit');
    Route::get('/testimonial/edit/{id}',[AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/edit/{id}',[AdminTestimonialController::class,'edit_submit'])->name('admin_testimonial_edit_submit');
    Route::get('/testimonial/delete/{id}',[AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    //Team Member
    Route::get('/team-member/index',[AdminTeamMemberController::class,'index'])->name('admin_team_member_index');
    Route::get('/team-member/create',[AdminTeamMemberController::class,'create'])->name('admin_team_member_create');
    Route::post('/team-member/create',[AdminTeamMemberController::class,'create_submit'])->name('admin_team_member_create_submit');
    Route::get('/team-member/edit/{id}',[AdminTeamMemberController::class, 'edit'])->name('admin_team_member_edit');
    Route::post('/team-member/edit/{id}',[AdminTeamMemberController::class,'edit_submit'])->name('admin_team_member_edit_submit');
    Route::get('/team-member/delete/{id}',[AdminTeamMemberController::class, 'delete'])->name('admin_team_member_delete');

    //Faq
    Route::get('/faq/index',[AdminFaqController::class,'index'])->name('admin_faq_index');
    Route::get('/faq/create',[AdminFaqController::class,'create'])->name('admin_faq_create');
    Route::post('/faq/create',[AdminFaqController::class,'create_submit'])->name('admin_faq_create_submit');
    Route::get('/faq/edit/{id}',[AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/faq/edit/{id}',[AdminFaqController::class,'edit_submit'])->name('admin_faq_edit_submit');
    Route::get('/faq/delete/{id}',[AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    //Blog Category
    Route::get('/blog-category/index',[AdminBlogCategoryController::class,'index'])->name('admin_blog_category_index');
    Route::get('/blog-category/create',[AdminBlogCategoryController::class,'create'])->name('admin_blog_category_create');
    Route::post('/blog-category/create',[AdminBlogCategoryController::class,'create_submit'])->name('admin_blog_category_create_submit');
    Route::get('/blog-category/edit/{id}',[AdminBlogCategoryController::class, 'edit'])->name('admin_blog_category_edit');
    Route::post('/blog-category/edit/{id}',[AdminBlogCategoryController::class,'edit_submit'])->name('admin_blog_category_edit_submit');
    Route::get('/blog-category/delete/{id}',[AdminBlogCategoryController::class, 'delete'])->name('admin_blog_category_delete');

    //Post
    Route::get('/post/index',[AdminPostController::class,'index'])->name('admin_post_index');
    Route::get('/post/create',[AdminPostController::class,'create'])->name('admin_post_create');
    Route::post('/post/create',[AdminPostController::class,'create_submit'])->name('admin_post_create_submit');
    Route::get('/post/edit/{id}',[AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/post/edit/{id}',[AdminPostController::class,'edit_submit'])->name('admin_post_edit_submit');
    Route::get('/post/delete/{id}',[AdminPostController::class, 'delete'])->name('admin_post_delete');

    //Destination
    Route::get('/destination/index',[AdminDestinationController::class,'index'])->name('admin_destination_index');
    Route::get('/destination/create',[AdminDestinationController::class,'create'])->name('admin_destination_create');
    Route::post('/destination/create',[AdminDestinationController::class,'create_submit'])->name('admin_destination_create_submit');
    Route::get('/destination/edit/{id}',[AdminDestinationController::class, 'edit'])->name('admin_destination_edit');
    Route::post('/destination/edit/{id}',[AdminDestinationController::class,'edit_submit'])->name('admin_destination_edit_submit');
    Route::get('/destination/delete/{id}',[AdminDestinationController::class, 'delete'])->name('admin_destination_delete');
    
    //Destination Photos
    Route::get('/destination/photos/index/{id}',[AdminDestinationController::class,'destination_photos_index'])->name('admin_destination_photos_index');
    Route::get('/destination/photo/create/{id}',[AdminDestinationController::class,'destination_photo_create'])->name('admin_destination_photo_create');
    Route::post('/destination/photo/create/{id}',[AdminDestinationController::class,'destination_photo_create_submit'])->name('admin_destination_photo_create_submit');
    Route::get('/destination/photo/edit/{id}',[AdminDestinationController::class,'destination_photo_edit'])->name('admin_destination_photo_edit');
    Route::post('/destination/photo/edit/{id}',[AdminDestinationController::class,'destination_photo_edit_submit'])->name('admin_destination_photo_edit_submit');
    Route::get('/destination/photos/delete/{id}',[AdminDestinationController::class,'destination_photo_delete'])->name('admin_destination_photo_delete');

    //Destination Videos
    Route::get('/destination/videos/index/{id}',[AdminDestinationController::class,'destination_videos_index'])->name('admin_destination_videos_index');
    Route::get('/destination/video/create/{id}',[AdminDestinationController::class,'destination_video_create'])->name('admin_destination_video_create');
    Route::post('/destination/video/create/{id}',[AdminDestinationController::class,'destination_video_create_submit'])->name('admin_destination_video_create_submit');
    Route::get('/destination/video/edit/{id}',[AdminDestinationController::class,'destination_video_edit'])->name('admin_destination_video_edit');
    Route::post('/destination/video/edit/{id}',[AdminDestinationController::class,'destination_video_edit_submit'])->name('admin_destination_video_edit_submit');
    Route::get('/destination/videos/delete/{id}',[AdminDestinationController::class,'destination_video_delete'])->name('admin_destination_video_delete');

    //Destination Packages
    Route::get('/package/index',[AdminPackageController::class,'index'])->name('admin_packages_index');
    Route::get('/package/create',[AdminPackageController::class,'create'])->name('admin_package_create');
    Route::post('/package/create',[AdminPackageController::class,'create_submit'])->name('admin_package_create_submit');
    Route::get('/package/edit/{id}',[AdminPackageController::class, 'edit'])->name('admin_package_edit');
    Route::post('/package/edit/{id}',[AdminPackageController::class,'edit_submit'])->name('admin_package_edit_submit');
    Route::get('/package/delete/{id}',[AdminPackageController::class, 'delete'])->name('admin_package_delete');
    


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
