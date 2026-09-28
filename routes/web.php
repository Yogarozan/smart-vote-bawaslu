<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\ReportController;

// Route Tampilan Per Menu
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/bilik-suara', [PageController::class, 'bilikSuara'])->name('bilik-suara');
Route::get('/quick-count', [PageController::class, 'quickCount'])->name('quick-count');
Route::get('/e-lapor', [ReportController::class, 'index'])->name('e-lapor');
Route::get('/audit', [PageController::class, 'audit'])->name('audit');

// Route Action (POST)
Route::post('/vote', [VotingController::class, 'store'])->name('vote.store');
Route::post('/e-lapor', [ReportController::class, 'store'])->name('report.store');
