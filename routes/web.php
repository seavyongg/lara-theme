<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/service-details', function () {
    return view('services-details');
})->name('services-details');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/portfolio-single', function () {
    return view('portfolio-single');
})->name('portfolio-single');
Route::get('/team', function () {
    return view('team');
})->name('team');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');
Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');
Route::get('/elements', function () {
    return view('elements');
})->name('elements');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/reset-password', function () {
    return view('auth.passwords.reset');
})->name('password.request');


// Add similar routes for all other pages
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
