<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('story/redirect', [StoryController::class, 'redirect']);
Route::get('drawing/redirect', [DrawingController::class, 'redirect']);
Route::get('drawing/getDrawing', [DrawingController::class, 'getDrawing'])->name('getDrawing');
Route::get('user/login', [UserController::class, 'login']);
Route::get('user/{user}/destroy', [UserController::class, 'destroy'])->name('deleteUser');
Route::get('user/{user}/update', [UserController::class, 'update'])->name('updateUser');
Route::get('story/getStory', [StoryController::class, 'getStory'])->name('getStory');
Route::resource('story', StoryController::class);
Route::post('story/{story}/post-comment', [StoryController::class, 'postComment'])->name('story.post-comment');
Route::post('drawing/{drawing}/post-comment', [DrawingController::class, 'postComment'])->name('drawing.post-comment');
Route::resource('user', UserController::class);
Route::resource('story', StoryController::class);
Route::resource('drawing', DrawingController::class);
Route::resource('comment', CommentController::class);
Route::resource('user', UserController::class);
Route::get('/', [IndexController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/api', function () {
    return view('api');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
