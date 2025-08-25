<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return view('pages.dashboard');
});

Route::resource('/students', StudentController::class);
Route::resource('/books', BookController::class);