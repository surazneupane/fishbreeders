<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['viewcontrol']], function () {
    Route::get('/', [ViewController::class, 'index'])->name('home');
    Route::get('/posts/{slug}', [ViewController::class, 'post'])->name('post');
    Route::get('/category/{slug}', [ViewController::class, 'category'])->name('category');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {return redirect(route('dashboard'));});
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::get('/category/{id}/create', [CategoryController::class, 'createSubCategory'])->name('category.subcategory.create');
    Route::post('/category/{id}/store', [CategoryController::class, 'storeSubCategory'])->name('category.subcategory.store');
    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
});
