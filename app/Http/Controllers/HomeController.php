<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Cource;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\HargaCara;
use App\Models\HargaPaket;
use App\Models\HargaDurasi;
use App\Models\HargaPeserta;
use Illuminate\Http\Request;
use App\Models\CategoryCource;
use RealRashid\SweetAlert\Facades\Alert;

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
        ->take(3)
        ->get();

      $teacher = Teacher::latest()->get();
      $cource = Cource ::latest()->get();

      // dd($category_by_course);
        return view('root.home', compact('teacher', 'category_by_latest', 'category_by_course', 'cource'));
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

      $category = CategoryCource ::all();
      $cource = Cource ::latest()->get();
      return view('root.cources', compact('category', 'cource'));
    }
    public function categoryList($id, Request $request) {

      $category = CategoryCource :: with('cources')-> find($id);

      // dd($category);

      return view('root.categoryList', compact('category'));
    }


    public function courcesDetail($id, Request $request) {
      
      $cource = Cource::find($id);
      return view('root.courcesDetail', compact('cource'));
    }











    public function biaya() {
      //ini diguanakan untuk looping select
      $category = CategoryCource ::all();
      $cource = Cource ::all();
      $cara = HargaCara ::all();
      $durasi = HargaDurasi ::all();
      $paket = HargaPaket ::all();
      $peserta = HargaPeserta ::all();

      //ini digunakan untuk perhitungan
      $categoryCourseData = CategoryCource::all()->pluck('rp', 'id')->toArray();
      $courseData = Cource::all()->pluck('rp', 'id')->toArray();
      $hargaCara = HargaCara::all()->pluck('rp', 'id')->toArray();
      $hargaDurasi = HargaDurasi::all()->pluck('rp', 'id')->toArray();
      $hargaPaket = HargaPaket::all()->pluck('rp', 'id')->toArray();
      $hargaPeserta = HargaPeserta::all()->pluck('rp', 'id')->toArray();
      
      return view('root.biaya', compact('categoryCourseData', 'courseData', 
      'hargaCara', 'hargaDurasi', 'hargaPaket', 'hargaPeserta',
    
      'category', 'cource', 'cara', 'durasi', 'paket', 'peserta'));
    }


    public function getCoursesByCategory($category_id)
    {
        $courses = Cource::where('category_cource_id', $category_id)->get();

        return response()->json($courses);
    }

    public function cek_harga(Request $request) {
      $validatedData = $request->validate([
          'cara' => 'required',
          'category' => 'required',
          'cource' => 'required',
          'paket' => 'required',
          'durasi' => 'required',
          'peserta' => 'required',
      ], [
          'required' => 'Kolom :attribute harus diisi.',
      ]);
  
      // Simpan data ke dalam model Student
      $harga = new Student();
      $harga->cara_id = $validatedData['cara'];
      $harga->category_cource_id = $validatedData['category'];
      $harga->cource_id = $validatedData['cource'];
      $harga->paket_id = $validatedData['paket'];
      $harga->durasi_id = $validatedData['durasi'];
      $harga->peserta_id = $validatedData['peserta'];
      $harga->harga = $request->input('hargaTotal');
      // $harga->save();
  
      // Kemudian, Anda dapat mengambil nilai-nilai dari relasi
      $category = $harga->categoryCource->name;
      $cource = $harga->cource->name;
      $cara = $harga->hargaCara->name;
      $durasi = $harga->hargaDurasi->name;
      $paket = $harga->hargaPaket->name;
      $peserta = $harga->hargaPeserta->name;
  
      // Di sini Anda dapat melakukan operasi lain jika diperlukan
  
      $hargaCara = $harga->cara_id;
      $hargaCategory = $harga->category_cource_id;
      $hargaCource = $harga->cource_id;
      $hargaPaket = $harga->paket_id;
      $hargaDurasi = $harga->durasi_id;
      $hargaPeserta = $harga->peserta_id;
      // dd($hargaCara);
  
      return view('root.daftar', 
      compact(
      'harga', 'category', 
      'cource', 'cara', 'durasi', 'paket', 'peserta',

      'hargaCara', 'hargaCategory', 'hargaCource', 'hargaPaket',
      'hargaPaket', 'hargaDurasi', 'hargaPeserta'));
  }
  
  
  

  public function daftar(Request $request) {

    // Membuat objek Student
    $student = new Student();
    $student->name = $request->input('name');
    $student->wa = $request->input('wa');
    $student->alamat = $request->input('alamat');
    $student->cara_id = $request->input('cara_id');
    $student->category_cource_id = $request->input('category_cource_id');
    $student->cource_id = $request->input('cource_id');
    $student->durasi_id = $request->input('durasi_id');
    $student->paket_id = $request->input('paket_id');
    $student->peserta_id = $request->input('peserta_id');
    $student->harga = $request->input('harga');
    // Menyimpan data ke dalam database
    // dd($student);
    $student->save();

    // Menampilkan pesan flash jika Anda menggunakan laravel-sweetalert atau sejenisnya
    // Pastikan Anda telah menginstal dan mengkonfigurasi pustaka tersebut dengan benar
    // alert('Selamat!', 'Data berhasil disimpan.');

    // Kembali ke tampilan 'root.biaya'
    Alert::success('Pendaftaran Berhasil', 'Kami akan menghubungi anda melalui nomor WhatsApps yang tertera');
    return redirect()->route('home');
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
