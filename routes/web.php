<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(["POST", "GET"], '/', [HomeController::class, 'home'])
    ->name('home');
