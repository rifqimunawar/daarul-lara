<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryCource;
use Intervention\Image\Facades\Image;

class CategoryCourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $category = CategoryCource::all();
        
      return view('dashboard.category-cources.index', compact('category') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category-cources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required', // Ganti 'nama_field' dengan nama field yang sesuai
            'description' => 'required', // Ganti 'nama_field' dengan nama field yang sesuai
            // Tambahkan validasi lain jika diperlukan
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        // Buat instance dari model CategoryCource
        $category = new CategoryCource();
        
        // Isi model CategoryCource dengan data dari request
        $category->name = $request->input('name');
        $category->description = $request->input('description'); 
        
        if ($request->hasFile('img')) {
          $image = $request->file('img');
          $newFileName = 'category' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

          // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
          $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('img/' . $newFileName));

          $category->img =  $newFileName;
        }
        dd($category);
        // Simpan data ke dalam database
        $category->save();
    
        // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
        return redirect()->route('index.category-cources');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(CategoryCource $categoryCource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menggunakan findOrFail dengan parameter $id untuk mencari CategoryCource yang sesuai.
        $category = CategoryCource::findOrFail($id);

        // Mengirim data $category ke view 'dashboard.category-cources.edit'.
        return view('dashboard.category-cources.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        // Temukan CategoryCource berdasarkan ID
        $category = CategoryCource::findOrFail($id);

        // Validasi data yang diterima dari request jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required', // Ganti 'name' dengan nama field yang sesuai
            // Tambahkan validasi lain jika diperlukan
        ]);

        // Isi model CategoryCource dengan data dari request
        $category->name = $request->input('name'); // Ganti 'name' dengan nama field yang sesuai dengan nama kolom di tabel database
        
        // Simpan data yang diperbarui ke dalam database
        $category->save();

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
        return redirect()->route('index.category-cources');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, CategoryCource $categoryCource)
    {
      $category = CategoryCource::findOrFail($id);
      $category->delete();
      return redirect()->route('index.category-cources');
    }
}
