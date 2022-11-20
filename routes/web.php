<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\CategoryController as AdminControllersCategoryController;
use App\Http\Controllers\AdminControllers\CommentsController;
use App\Http\Controllers\AdminControllers\PostsController;
use App\Http\Controllers\AdminControllers\RolesController;
use App\Http\Controllers\AdminControllers\ServicesController;

/*FRONT USER ROUTES*/

//GET
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'about'])->name('about');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::get('/posts',[PostController::class,'index'])->name('post.home');
Route::get('/post/{post:slug}',[PostController::class,'show'])->name('post.show');
Route::get('/category/{category:slug}',[CategoryController::class,'show'])->name('category.show');

Route::get('/services',[ServiceController::class,'index'])->name('service.index');
Route::get('/service/{service:slug}',[ServiceController::class,'show'])->name('service.show');
//POST
Route::post('/post/{post:slug}',[PostController::class,'addComment'])->name('post.comment');
Route::post('/services',[ServiceController::class,'store'])->name('service.contact');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

require __DIR__.'/auth.php';

/*ADMIN ROUTES */
Route::prefix('admins')->name('admin.')->middleware(['auth','check_permissions'])->group(function(){

    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('roles', RolesController::class)->except('show');
    Route::resource('posts',PostsController::class);
    Route::resource('services',ServicesController::class);
    Route::resource('categories',AdminControllersCategoryController::class);
    Route::resource('comments',CommentsController::class)->except('show');
});


