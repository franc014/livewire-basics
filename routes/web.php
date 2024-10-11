<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ArticleController;
use App\Livewire\ShowArticle;
use App\Livewire\Pages\Articles\ArticleList;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/articles', ArticleList::class)->middleware(['auth', 'verified'])->name('articles');;    
Route::get('/articles/{article}', ShowArticle::class)
    ->middleware(['auth', 'verified']);
        

require __DIR__.'/auth.php';
