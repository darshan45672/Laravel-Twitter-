<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('homepage');

Route::resource('ideas', IdeasController::class)->except(['index','create',])->middleware('auth');
Route::resource('ideas', IdeasController::class)->only(['show',]);

Route::resource('ideas.comments', CommentController::class)->only(['store',])->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
});
