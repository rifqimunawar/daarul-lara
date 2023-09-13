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
          'cource_id'=>'1'
        ]);
        DB::table('teachers')->insert([
          'name'=> 'munawar',
          'cource_id'=>'1'
        ]);
        DB::table('teachers')->insert([
          'name'=> 'ridwan',
          'cource_id'=>'3'
        ]);

    }
}
