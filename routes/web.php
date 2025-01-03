<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Homepage route
Route::get('/', [GuestController::class, 'home'])->name('guest.home');

// Authentication route
Route::get('/login', [GuestController::class, 'login'])->name('guest.login');
Route::get('/logout', [GuestController::class, 'logout'])->name('guest.logout');
Route::post('/login/auth', [GuestController::class, 'login_auth'])->name('guest.login_auth');
Route::get('/register', [GuestController::class, 'register'])->name('guest.register');
Route::post('/register/store', [GuestController::class, 'register_store'])->name('guest.register_store');
Route::get('/forgot-password', [GuestController::class, 'forgot_password'])->name('guest.forgot_password');
Route::post('/reset-password', [GuestController::class, 'reset_password'])->name('guest.reset_password');

// Blog route
Route::get('/blog/{slug}', [GuestController::class, 'blog_show'])->name('guest.blog_show');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Posts route
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    // Categories route
    Route::get('/categories', [PostController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [PostController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}', [PostController::class, 'show'])->name('admin.categories.show');
    Route::put('/categories/{id}', [PostController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [PostController::class, 'destroy'])->name('admin.categories.destroy');

    // Comments route
    Route::get('/comments', [PostController::class, 'index'])->name('admin.comments');
    Route::post('/comments', [PostController::class, 'store'])->name('admin.comments.store');
    Route::get('/comments/{id}', [PostController::class, 'show'])->name('admin.comments.show');
    Route::put('/comments/{id}', [PostController::class, 'update'])->name('admin.comments.update');
    Route::delete('/comments/{id}', [PostController::class, 'destroy'])->name('admin.comments.destroy');

    // Users route
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Settings routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});

// Fallback Route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});