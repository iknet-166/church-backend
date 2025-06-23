<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Posts routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/posts-view', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create-post', [PostController::class, 'create'])->name('posts.create');
    Route::post('/create-post', [PostController::class, 'store'])->name('posts.store');
    Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/edit-post/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/delete-post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // 🔐 User profile settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
