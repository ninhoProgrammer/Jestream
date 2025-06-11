<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;


Route::get('/dashbord', [HomeController::class, 'index'])->name('admin.home');

Route::resource('admin/users', UserController::class)->names('admin.users');
Route::resource('admin/roles', RoleController::class)->names('admin.roles');
Route::resource('admin/categories', CategoryController::class)->names('admin.categories');
Route::resource('admin/tags', TagController::class)->names('admin.tags');
Route::resource('admin/posts', PostController::class)->names('admin.posts');