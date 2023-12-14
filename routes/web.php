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

Route::get('/', [ DashboardController::class, 'index']) -> name('homepage');

Route::post('/ideas', [ IdeasController::class, 'store']) -> name('ideas.store');

Route::get('/ideas/{idea}', [ IdeasController::class, 'show']) -> name('ideas.show');

Route::get('/ideas/{idea}/edit', [ IdeasController::class, 'edit']) -> name('ideas.edit');

Route::put('/ideas/{idea}', [ IdeasController::class, 'update']) -> name('ideas.update');

Route::delete('/ideas/{idea}', [ IdeasController::class, 'destroy']) -> name('idea.destroy');

Route::post('/ideas/{idea}/comments', [ CommentController::class, 'store']) -> name('ideas.comments.store');

Route::get('/register', [ AuthController::class, 'register']) -> name('register');
Route::post('/register', [ AuthController::class, 'store']);

Route::get('/terms', function(){
    return view('terms');
});
