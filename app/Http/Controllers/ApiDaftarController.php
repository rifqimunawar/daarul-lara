<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDaftarController extends Controller
{
    public function index() {
      return response()->json([
        'name' => 'Rifqi',
      ]);
    }
}
