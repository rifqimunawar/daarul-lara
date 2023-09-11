<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded=([]);

    // =========== ada kemungkinan many to many, 
    // bisa saja satu guru punya banyak cource,
    // untuk sementara one to one satu guru satu cource
    public function cource()
    {
        return $this->belongsTo(Cource::class, 'cource_id');
    }
}
