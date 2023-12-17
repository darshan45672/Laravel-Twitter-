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

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {

    Route::get('/{idea}', [IdeasController::class, 'show'])->name('show');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('/', [IdeasController::class, 'store'])->name('store');

        Route::get('/{idea}/edit', [IdeasController::class, 'edit'])->name('edit');

        Route::put('/{idea}', [IdeasController::class, 'update'])->name('update');

        Route::delete('/{idea}', [IdeasController::class, 'destroy'])->name('destroy');

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });

});




Route::get('/terms', function () {
    return view('terms');
});
