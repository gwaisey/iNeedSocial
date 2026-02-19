<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

// Halaman Splash Awal (Page 1)
Route::get('/', function () {
    return Inertia::render('Welcome');
});

// Halaman Selamat Datang (Page 2)
Route::get('/welcome', function () {
    return Inertia::render('WelcomeStepTwo');
})->name('welcome');

// Route yang butuh Login (Auth)
Route::middleware(['auth', 'verified'])->group(function () {

    // Halaman Feed Utama
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    // Fitur Create Post
    Route::get('/posts/create', function () {
        return Inertia::render('Posts/Create');
    })->name('posts.create');



    // Fitur Like & Comment
    Route::post('/posts/{post}/like', [PostController::class, 'toggleLike'])->name('posts.like');
    Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('comments.store');

    // Halaman Profil User (Grid View ala Instagram)
    Route::get('/my-profile', [PostController::class, 'profile'])->name('my-profile');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

});
// Pastikan ini ada di dalam Route::middleware(['auth']...
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
require __DIR__.'/auth.php';
