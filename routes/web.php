<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FishController;
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
ROute::post('/feedback/add', [FeedbackController::class, 'addFeedback'])->name('user.addFeedback');

Route::group(['middleware' => ['viewcontrol']], function () {
    Route::get('/', [ViewController::class, 'index'])->name('home');
    Route::get('/posts/search', [ViewController::class, 'search'])->name('search');
    Route::get('/posts/{slug}', [ViewController::class, 'post'])->name('post');
    Route::get('/category/{slug}', [ViewController::class, 'category'])->name('category');

    Route::get('/user/login', [ViewController::class, 'login'])->name('ext-login');
    Route::get('/user/sign-up', [ViewController::class, 'register'])->name('ext-register');
    Route::post('/user/sign-up', [ViewController::class, 'registerUser'])->name('ext-register.user');
    Route::post('/user/login', [ViewController::class, 'loginUser'])->name('ext-login.user');

    Route::get('/forums', [ViewController::class, 'forum'])->name('forums');
    Route::get('/forums/{question}/answers', [ViewController::class, 'singleForum'])->name('forums.show');

    Route::post('/forums/ask/question', [ViewController::class, 'askQuestion'])->name('user.forum.ask');
    Route::post('/forums/give/{question}/answer', [ViewController::class, 'giveAnswer'])->name('user.forum.giveans');

    Route::get('/questions/view', [ViewController::class, 'myQuestions'])->name('ext-user.myquest');
    Route::post('/question/{id}/delete', [ViewController::class, 'deleteQuestion'])->name('ext-user.myquesdel');
    Route::post('/question/{id}/edit', [ViewController::class, 'editQuestion'])->name('ext-user.myquesedit');

    Route::get('/profile', [ViewController::class, 'profile'])->name('ext-user.profile');
    Route::post('/profile/{id}/update', [ViewController::class, 'updateProfile'])->name('ext-user.profileupdate');

    Route::post('/forums/ask/question', [ViewController::class, 'askQuestion'])->name('user.forum.ask');
    Route::post('/forums/give/{question}/answer', [ViewController::class, 'giveAnswer'])->name('user.forum.giveans');
    Route::post('/forums/answer/{id}/delete', [ViewController::class, 'deleteANswer'])->name('user.forum.deleteans');

    Route::get('/notification/{id}/show', [ViewController::class, 'notificationShow'])->name('notification.show');

    Route::get('/aquarium-calculator', [ViewController::class, 'calculator'])->name('calculator');

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
    Route::get('/feedback', [FeedbackController::class, 'showFeedbacks'])->name('admin.showfeedback');
    Route::post('/feedback/{id}/delete', [FeedbackController::class, 'deleteFeedback'])->name('admin.delete.feedback');
    Route::get('/feedback/{feedback}/view',[FeedbackController::class,'showFeedback'])->name('admin.showsinglefeedback');
    Route::resource("/fishes", FishController::class);
    Route::post('/fishes/copactibility/{id}/save',[FishController::class,'saveCompactibility'])->name('fish.savecompactibility');

});
