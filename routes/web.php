<?php

use App\Http\Controllers\AdminControllers\ContactConfigController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminControllers\AboutConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\BgConfigController;
use App\Http\Controllers\AdminControllers\CategoryController as AdminControllersCategoryController;
use App\Http\Controllers\AdminControllers\ChoiceConfigController;
use App\Http\Controllers\AdminControllers\CommentsController;
use App\Http\Controllers\AdminControllers\ConfigController;
use App\Http\Controllers\AdminControllers\ContactsController;
use App\Http\Controllers\AdminControllers\PostsController;
use App\Http\Controllers\AdminControllers\RolesController;
use App\Http\Controllers\AdminControllers\ServiceContactsController;
use App\Http\Controllers\AdminControllers\ServicesController;
use App\Http\Controllers\AdminControllers\UsersController;

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
    Route::resource('users',UsersController::class);

    //mail contact visiteurs
    Route::get('contacts',[ContactsController::class,'index'])->name('contacts.index');
    Route::delete('contacts/{contact}',[ContactsController::class,'destroy'])->name('contacts.destroy');

    //mail contact clients
    Route::get('contactService',[ServiceContactsController::class,'index'])->name('serviceContact.index');
    Route::delete('contactService/{askService}', [ServiceContactsController::class, 'destroy'])->name('serviceContact.destroy');
    
    //Configurations
    Route::get('about',[AboutConfigController::class,'edit'])->name('about.edit');
    Route::post('about',[AboutConfigController::class,'update'])->name('about.update');

    Route::get('contact',[ContactConfigController::class,'edit'])->name('contact.edit');
    Route::post('contact',[ContactConfigController::class,'update'])->name('contact.update');

    Route::get('choice',[ChoiceConfigController::class,'edit'])->name('choice.edit');
    Route::post('choice',[ChoiceConfigController::class,'update'])->name('choice.update');

    Route::get('config',[ConfigController::class,'edit'])->name('config.edit');
    Route::post('config',[ConfigController::class,'update'])->name('config.update');

    Route::get('bgConfig',[BgConfigController::class,'edit'])->name('bgConfig.edit');
    Route::post('bgConfig',[BgConfigController::class,'update'])->name('bgConfig.update');
});


