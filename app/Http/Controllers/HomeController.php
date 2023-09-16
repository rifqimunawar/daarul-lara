<?php

namespace App\Http\Controllers;

use App\Models\CategoryCource;
use App\Models\Cource;
use App\Models\Home;
use App\Models\Student;
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
      $category = CategoryCource ::all();
      $cource = Cource ::all();

      $categoryData = [
        'Online' => 10000,
        'Offline' => 20000,
        'Hybrid' => 20000
    ];
    
    // Contoh data untuk hargaCourse
    $courseData = [
        // Data kategori 1
        1 => [
            'id' => 1,
            'rp' => 5000
        ],
        // Data kategori 2
        2 => [
            'id' => 2,
            'rp' => 8000
        ],
        // Data kategori 3
        3 => [
            'id' => 3,
            'rp' => 10000
        ],
        // ...
    ];
    
    return view('root.biaya', [
        'categoryData' => $categoryData,
        'courseData' => $courseData,
        'category' => $category,
        'cource' => $cource
        // ...
    ]);
    }


    public function getCoursesByCategory($category_id)
    {
        $courses = Cource::where('category_cource_id', $category_id)->get();

        return response()->json($courses);
    }


    public function cek_harga(Request $request) {
      // $validatedData = $request->validate([
      //     'cara' => 'required',
      //     'category' => 'required',
      //     'cource' => 'required',
      //     'paket' => 'required',
      //     'durasi' => 'required',
      //     'peserta' => 'required',
      // ]);
  
      $harga = new Student();
      $harga->cara = $request['cara'];
      $harga->category = $request['category'];
      $harga->cource = $request->input('cource'); // Set it as a property of $harga
      $harga->paket = $request['paket'];
      $harga->durasi = $request['durasi'];
      $harga->peserta = $request['peserta'];
      
      dd($harga);
      
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
