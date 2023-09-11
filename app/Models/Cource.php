<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use HasFactory;
    protected $guarded=([]);

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($cource) {
            if ($cource->teachers()->count() > 0) {
                // Jika ada relasi dengan teacher, mencegah penghapusan.
                return false;
            }
        });
    }
    public function category()
    {
        return $this->belongsTo(CategoryCource::class, 'category_cource_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'cource_id');
    }
}
