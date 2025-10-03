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
Route::get("/borrow-search-student",[BorrowController::class,"searchStudentGet"])->name( "borrow.student.get");
Route::get("/borrow-assign/{id}",[BorrowController::class,"borrowAssign"])->name("borrow.assign");
Route::get("/borrow-returned/{id}/{book}",[BorrowController::class,"borrowReturned"])->name("borrow.returned");
Route::get("/borrow-overdue/{id}",[BorrowController::class,"borrowOverdue"])->name("borrow.overdue");