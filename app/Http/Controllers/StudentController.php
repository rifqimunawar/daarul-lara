<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $students = Student::with('categoryCource', 'cource', 'teacher')->latest()->get();
      // dd($students);
        return view('dashboard.students.pendaftar', compact('students'));
    }

    function studentAktif() {
        $students = Student
        ::with('categoryCource', 'cource', 'teacher')
        ->where ('status', 1)
        ->latest()->get();

        // dd($students);
        return view('dashboard.students.aktif', compact('students'));
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
        //
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
    public function edit($id, Student $student)
    {
        $student = Student ::findOrFail($id);
        
        return view('dashboard.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $student = Student::findOrFail($id);
        $student->status = $request->input('status'); 
        $student->save();
    
        return redirect()->route('index.student');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
