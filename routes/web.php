<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ArticleController;
use App\Livewire\ShowArticle;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/articles/{article}', ShowArticle::class);    

require __DIR__.'/auth.php';
