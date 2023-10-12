<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index() {
    $student = Student ::all();
    $studentAktif = Student ::where('status', 1)->get();
    $pengajar = Teacher::all();
    $pendapatanKotor = Student::where('status', 1)->sum('harga');

    return view('dashboard.index', compact('student', 'studentAktif', 'pengajar', 'pendapatanKotor'));
  }
}
