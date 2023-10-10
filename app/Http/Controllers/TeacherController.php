<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      {
        $teacher = Teacher::latest()->get();
          
        // dd($teacher);
        return view('dashboard.teacher.index', compact('teacher') );
      }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $cource = Cource::latest()->get();
      return view('dashboard.teacher.create', compact('cource'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'cource_id' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->cource_id = $request->input('cource_id');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $newFileName = 'profile' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

            // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
            $compressedImage = Image::make($image)->resize(500, null, function ($constraint) {
              $constraint->aspectRatio();
              })->save(public_path('img/' . $newFileName));

            $teacher->img =  $newFileName;
        }

        $teacher->save();

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
        return redirect()->route('index.teacher');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Teacher $teacher)
    {
      $teacher = Teacher::findOrFail($id);
      $cource = Cource::all();
      return view('dashboard.teacher.edit', compact('teacher', 'cource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'cource_id' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg', // Anda bisa membiarkan gambar kosong jika tidak ingin menggantinya.
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->name = $request->input('name');
        $teacher->cource_id = $request->input('cource_id');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $newFileName = 'profile' . '_' . $request->name . '_' . now()->timestamp . '.' . $image->getClientOriginalExtension();

            // Simpan gambar yang diunggah ke direktori penyimpanan sambil mengkompresi ulang
            $compressedImage = Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/' . $newFileName));

            $teacher->img = $newFileName;
        }

        $teacher->save();

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
        return redirect()->route('index.teacher');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Teacher $teacher)
    {
      $teacher = Teacher::findOrFail($id);
      $teacher->delete();
      return redirect()->route('index.teacher');
    }
}
