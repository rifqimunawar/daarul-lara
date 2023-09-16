<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

      public function categoryCource()
      {
          return $this->belongsTo(CategoryCource::class, 'category_cource_id');
      }
  
      public function cource()
      {
          return $this->belongsTo(Cource::class, 'cource_id');
      }
  
      public function hargaCara()
      {
          return $this->belongsTo(HargaCara::class, 'cara_id');
      }
  
      public function hargaDurasi()
      {
          return $this->belongsTo(HargaDurasi::class, 'durasi_id');
      }
  
      public function hargaPaket()
      {
          return $this->belongsTo(HargaPaket::class, 'paket_id');
      }
  
      public function hargaPeserta()
      {
          return $this->belongsTo(HargaPeserta::class, 'peserta_id');
      }
}
