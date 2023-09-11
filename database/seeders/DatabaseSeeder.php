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
        ]);
        DB::table('category_cources')->insert([
          'name'=> 'SMP',
        ]);
        DB::table('category_cources')->insert([
          'name'=> 'SMA',
        ]);


        // ===========================================
        DB::table('cources')->insert([
          'name'=> 'calistung',
          'category_cource_id'=>'1'
        ]);
        DB::table('cources')->insert([
          'name'=> 'membaca',
          'category_cource_id'=>'1'
        ]);
        DB::table('cources')->insert([
          'name'=> 'geografi',
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
