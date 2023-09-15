<?php

namespace App\Http\Controllers;

use App\Models\CategoryCource;
use App\Models\Cource;
use App\Models\Home;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $category_by_latest = CategoryCource::latest()->get();
      $category_by_course = CategoryCource::withCount('cources')
        ->orderBy('cources_count', 'desc') // Urutkan berdasarkan jumlah kursus secara descending (terbanyak ke terendah)
        ->first(); // Ambil satu kategori kursus dengan jumlah kursus terbanyak

      $teacher = Teacher::latest()->get();

      // ddd($category_by_course);
        return view('root.home', compact('teacher', 'category_by_latest', 'category_by_course'));
    }

    public function about()
    {
      $category_by_latest = CategoryCource::latest()->get();
      $category_by_course = CategoryCource::withCount('cources')
        ->orderBy('cources_count', 'desc') // Urutkan berdasarkan jumlah kursus secara descending (terbanyak ke terendah)
        ->first(); // Ambil satu kategori kursus dengan jumlah kursus terbanyak

      $teacher = Teacher::latest()->get();

      // ddd($category_by_course);
        return view('root.about', compact('teacher', 'category_by_latest', 'category_by_course'));
    }

    public function cources() {
      return view('root.cources');
    }

    public function biaya() {
      return view('root.biaya');
    }


    public function getCoursesByCategory($category_id)
    {
        $courses = Cource::where('category_cource_id', $category_id)->get();

        return response()->json($courses);
    }

    public function daftar() {
      return view('root.daftar');
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
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
