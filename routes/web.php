<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\PopularController;

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



Route::get('/popularities', [PopularController::class, 'index'])->name('popularities');
Route::get('/keeps', function() {
    return view('posts.keeps');
})->name('keeps');
Route::post('/actions', [ActionController::class, 'store']);
Route::get('/my-posts', [ActionController::class, 'NotAchieveTodo']);
Route::get('/achievements', [ActionController::class, 'AchieveTodo'])->name('achievements');
Route::get('/achievements/{action}', [ActionController::class, 'show']);
Route::put('/actions/{action}/done', [ActionController::class, 'done']);

Route::post('/action/like', [LikeController::class, 'likePost']);
 
 Route::get('/', [ActionController::class, 'index'])->name('news');
 
 Route::post('/actions/{action}/comments', [CommentController::class, 'store']);
 
 Route::get('/action/{action}/choice/create', [ChoiceController::class, 'create'])->name('choice.create');
 Route::put('/choice/store', [ChoiceController::class, 'store'])->name('choice.store');
 Route::get('/action/{action}', [ActionController::class, 'newsShow']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
