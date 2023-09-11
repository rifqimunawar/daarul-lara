<?php

namespace App\Http\Controllers;

use App\Models\CategoryCource;
use Illuminate\Http\Request;

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
            // Tambahkan validasi lain jika diperlukan
        ]);
    
        // Buat instance dari model CategoryCource
        $category = new CategoryCource();
        
        // Isi model CategoryCource dengan data dari request
        $category->name = $request->input('name'); // Ganti 'nama_field' dengan nama field yang sesuai sesuai dengan nama kolom di tabel database
        
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
