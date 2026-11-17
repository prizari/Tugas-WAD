<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// halaman utama
Route::get('/', function () {
    return view('home');
    })->name('home');
    
    //routing CRUD event
   Route::resource('events', EventController::class)->except(['show']);
