<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return view('pages.dashboard');
});

Route::resource('/students', StudentController::class);
Route::resource('/books', BookController::class);
Route::resource('/borrow', BorrowController::class);

Route::get("/borrow-search",[BorrowController::class,"search"])->name("borrow.search");
Route::post("/borrow-search-student",[BorrowController::class,"searchStudent"])->name( "borrow.student");