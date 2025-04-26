<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ["posts" => Post::all()]);
})->name('home');

Route::get('create', [PostController::class, "create"]);

Route::post('store', [PostController::class, "ourFilestore"])->name('store');
