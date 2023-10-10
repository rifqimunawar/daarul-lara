<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('category_cources')->insert([
          'name'=> 'SD',
          'img'=>'cat-1.jpg',
        ]);
        DB::table('category_cources')->insert([
          'name'=> 'SMP',
          'img'=>'cat-2.jpg',
        ]);
        DB::table('category_cources')->insert([
          'name'=> 'SMA',
          'img'=>'cat-3.jpg',
        ]);


        // ===========================================
        DB::table('cources')->insert([
          'name'=> 'calistung',
          'img'=> 'course-1.jpg',
          'category_cource_id'=>'1'
        ]);
        DB::table('cources')->insert([
          'name'=> 'membaca',
          'img'=> 'course-2.jpg',
          'category_cource_id'=>'1'
        ]);
        DB::table('cources')->insert([
          'name'=> 'geografi',
          'img'=> 'course-3.jpg',
          'category_cource_id'=>'3'
        ]);


        // ===========================================
        DB::table('teachers')->insert([
          'name'=> 'rifqi',
          'cource_id'=>'1',
          'rp'=>'80000'
        ]);
        DB::table('teachers')->insert([
          'name'=> 'munawar',
          'cource_id'=>'1',
          'rp'=>'80000'
        ]);
        DB::table('teachers')->insert([
          'name'=> 'ridwan',
          'cource_id'=>'3',
          'rp'=>'90000'
        ]);


        // ===========================================
        DB::table('harga_caras')->insert([
          'name'=> 'Online',
          'rp'=>100000
        ]);
        DB::table('harga_caras')->insert([
          'name'=> 'Offline',
          'rp'=>150000
        ]);
        DB::table('harga_caras')->insert([
          'name'=> 'Hybrid',
          'rp'=>125000
        ]);

        // ===========================================
        DB::table('harga_pakets')->insert([
          'name'=> '4 Pertemuan / Bulan',
          'rp'=>100000
        ]);
        DB::table('harga_pakets')->insert([
          'name'=> '6 Pertemuan / Bulan',
          'rp'=>150000
        ]);
        DB::table('harga_pakets')->insert([
          'name'=> '8 Pertemuan / Bulan',
          'rp'=>200000
        ]);

        // ===========================================
        DB::table('harga_durasis')->insert([
          'name'=> '60 Menit / Pertemuan',
          'rp'=>100000
        ]);
        DB::table('harga_durasis')->insert([
          'name'=> '90 Menit / Pertemuan',
          'rp'=>'125000'
        ]);
        DB::table('harga_durasis')->insert([
          'name'=> '120 Menit / Pertemuan',
          'rp'=>150000
        ]);

        // ===========================================
        DB::table('harga_pesertas')->insert([
          'name'=> '1 Orang',
          'rp'=>50000
        ]);
        DB::table('harga_pesertas')->insert([
          'name'=> '2 Orang',
          'rp'=>100000
        ]);
        DB::table('harga_pesertas')->insert([
          'name'=> '3 Orang',
          'rp'=>150000
        ]);
        DB::table('harga_pesertas')->insert([
          'name'=> '4 Orang',
          'rp'=>2000000
        ]);

    }
}
