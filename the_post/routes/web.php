<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/writer/{user}', [ArticleController::class, 'byWriter'])->name('article.byWriter');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
Route::get('article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/unset-admin', [AdminController::class, 'unsetAdmin'])->name('admin.unsetAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/unset-revisor', [AdminController::class, 'unsetRevisor'])->name('admin.unsetRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::patch('/admin/{user}/unset-writer', [AdminController::class, 'unsetWriter'])->name('admin.unsetWriter');
});

Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function(){
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');
});
