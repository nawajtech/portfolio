<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.index');
})->name('home');

Route::get('/about', function () {
    return redirect('/#about');
})->name('about');

Route::get('/skills', function () {
    return redirect('/#skills');
})->name('skills');

Route::get('/projects', function () {
    return redirect('/#projects');
})->name('projects');

Route::get('/experience', function () {
    return redirect('/#experience');
})->name('experience');

Route::get('/contact', function () {
    return redirect('/#contact');
})->name('contact.index');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
