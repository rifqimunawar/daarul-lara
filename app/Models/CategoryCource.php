<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCource extends Model
{
    use HasFactory;
    protected $guarded=([]);

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->cources()->count() > 0) {
                // Jika ada relasi dengan cources, mencegah penghapusan.
                return false;
            }
        });
    }

    public function cources()
    {
        return $this->hasMany(Cource::class, 'category_cource_id');
    }
}
