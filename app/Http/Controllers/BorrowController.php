<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = DB::table("borrows")
        ->join("students","borrows.student_id","=","students.id")
        ->join("books","borrows.book_id","=","books.id")
        ->select("borrows.*", "students.name", "students.photo", "books.title" , "books.cover")
        ->where("borrows.status","pending")
        ->orWhere("borrows.status","overdue")
        ->orderBy("return_date","asc")
        ->get();
        return view("borrow.index", ['borrows' => $borrows]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = now(); // current datetime
        DB::table("borrows")->insert([
            "student_id"=> $request->student_id,
            "book_id"=> $request->book_id,
            "return_date"=> \Carbon\Carbon::parse($request->return_date)
                        ->setTime($now->hour, $now->minute, $now->second),
            "created_at"=> $now,
        ]);

        $book_data = DB::table("books")->where("id", $request->book_id)->first();
        DB::table("books")
        ->where("id", $request->book_id)
        ->update([
            "available_copy" =>$book_data->available_copy - 1,
        ]);
        return back()->with("success","Successfully Assigned a Book.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrow $borrow)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrow $borrow)
    {
        //
    }

    public function searchStudentGet(){
        return redirect("/borrow-search");
    }

    public function search(){
        $students = DB::table("students")->get();
        return view("borrow.search_student",["students"=> $students]);
    }
    // seacrch student data
    public function searchStudent(Request $request){
        $students = DB::table("students")
        ->where("student_id", $request->search)
        ->orWhere("email", $request->search)
        ->orWhere("phone", $request->search)
        ->get();

        return view("borrow.search_student",["students"=> $students]);
    }

    public function borrowAssign($id){
        $student = DB::table("students")
        ->where("id", $id)
        ->first();  
        $books = DB::table("books")
        ->get();

        
        return view("borrow.assign_book", [
            'student' => $student,
            'books'=> $books
        ]);
    }

    public function borrowReturned($id , $book_id){
        DB::table('borrows')
        ->where('id' , $id)
        ->update([
            'status'=> 'returned'
        ]);

        $book_data = DB::table("books")->where("id", $book_id)->first();
        DB::table("books")
        ->where("id", $book_id)
        ->update([
            "available_copy" =>$book_data->available_copy + 1,
        ]);

        return back()->with('success','Borrow Status Update Successfully!');
    }

        public function borrowOverdue($id){
        DB::table('borrows')
        ->where('id' , $id)
        ->update([
            'status'=> 'overdue'
        ]);

        return back()->with('success','Borrow Status Update Successfully!');
    }
}
