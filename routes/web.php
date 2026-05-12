<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CampaignController;


Route::resource('campaign', CampaignController::class);
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);



