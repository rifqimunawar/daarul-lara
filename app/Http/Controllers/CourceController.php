<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use Illuminate\Http\Request;
use App\Models\CategoryCource;
use Intervention\Image\Facades\Image;

class CourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $cource = Cource::latest()->get();
        
      return view('dashboard.cource.index', compact('cource') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $category = CategoryCource::latest()->get();
      return view('dashboard.cource.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'name' => 'required',
          'category_cource_id' => 'required',
      ]);
  
      $cource = new Cource();
      
      $cource->name = $request->input('name'); 
      $cource->category_cource_id = $request->input('category_cource_id'); 

      
      if ($request->hasFile('img')) {
        $image = $request->file('img');
        $newFileName = 'courses' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

        // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
        $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
          $constraint->aspectRatio();
          })->save(public_path('img/' . $newFileName));

        $cource->img =  $newFileName;
      }
      
      $cource->save();
  
      // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
      return redirect()->route('index.cource');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cource $cource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Cource $cource)
    {
      $cource = Cource::findOrFail($id);
      $category = CategoryCource::all();
      return view('dashboard.cource.edit', compact('cource', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Cource $cource)
    {
        $cource = Cource::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required', 
            'category_cource_id' => 'required', 
            'status' => 'required', 
            'img' => 'required', 
        ]);

        $cource->name = $request->input('name'); 
        $cource->category_cource_id = $request->input('category_cource_id'); 
        $cource->status = $request->input('status'); 

        if ($request->hasFile('img')) {
          $image = $request->file('img');
          $newFileName = 'courses' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

          // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
          $compressedImage = Image::make($image)->resize(700, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('img/' . $newFileName));

          $cource->img =  $newFileName;
        }
        
        dd($cource);
        $cource->save();
        
        // dd($cource);
        return redirect()->route('index.cource');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Cource $cource)
    {
      $cource = Cource::findOrFail($id);
      $cource->delete();
      return redirect()->route('index.cource');
    }
}
