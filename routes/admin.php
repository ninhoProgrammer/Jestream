<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;


Route::get('/dashbord', [HomeController::class, 'index'])->name('admin.home');
Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::resource('admin/categories', CategoryController::class)->names('admin.categories');
Route::resource('admin/tags', TagController::class)->names('admin.tags');

Route::resource('admin/posts', PostController::class)->names('admin.posts');