<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->get();
        return view('student.index', [
            'students' =>  $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => "required",
            'email'          => "required|email",
            'phone'          => "required ",
        ]);

        $image = $request->file('photo');
        $fileName = md5(rand(100000, 10000000) . '_'. time(). '_'. str_shuffle("qwertyuiopplkjhgfdsazxcvb")) . "." . $image->getClientOriginalExtension();

        // upload file
        $image -> move(public_path('media/student'), $fileName);

        DB::table('students')->insert([
            "name"                 => $request -> name,
            "email"                => $request -> email,
            "phone"                => $request -> phone,
            "student_id"                => $request -> student_id,
            "address"              => $request -> address,
            "photo"                => $fileName,
            "created_at"           => now()
        ]);

        return back() -> with("success", "Book created successful");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
