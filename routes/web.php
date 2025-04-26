<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('create', [PostController::class, "create"]);

Route::post('store', [PostController::class, "ourFilestore"])->name('store');
