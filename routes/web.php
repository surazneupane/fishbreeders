<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SocialiteAuthController;
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

Route::get('/oauth/{driver}', [SocialiteAuthController::class, 'redirectToProvider'])->name('oauth');
Route::get('/oauth/{driver}/callback', [SocialiteAuthController::class, 'handleProviderCallback'])->name('oauth.callback');

Route::group(['middleware' => ['viewcontrol']], function () {
    Route::get('/', [ViewController::class, 'index'])->name('home');
    Route::get('/posts/{slug}', [ViewController::class, 'post'])->name('post');
    Route::get('/category/{slug}', [ViewController::class, 'category'])->name('category');
    Route::get('/forums', [ViewController::class, 'forum'])->name('forums');
    Route::get('/user/login', [ViewController::class, 'login'])->name('ext-login');
    Route::get('/user/sign-up', [ViewController::class, 'register'])->name('ext-register');
    Route::post('/user/sign-up', [ViewController::class, 'registerUser'])->name('ext-register.user');
    Route::post('/user/login', [ViewController::class, 'loginUser'])->name('ext-login.user');

});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified', 'checkauth'], 'prefix' => 'admin'], function () {
    Route::get('/', function () {return redirect(route('dashboard'));});
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::get('/category/{id}/create', [CategoryController::class, 'createSubCategory'])->name('category.subcategory.create');
    Route::post('/category/{id}/store', [CategoryController::class, 'storeSubCategory'])->name('category.subcategory.store');
    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::get('/siteinfo', [SiteController::class, 'index'])->name('siteinfo.index');
    ROute::post('/siteinfo/store', [SiteController::class, 'store'])->name('siteinfo.store');
    Route::get("/forums", [ForumController::class, 'index'])->name('forums.index');
    Route::resource("/questions", QuestionController::class);
});
