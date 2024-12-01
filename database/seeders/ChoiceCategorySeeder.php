<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ChoiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choiceCategories')->insert([
                'name' => 'やってみたい',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
          DB::table('choiceCategories')->insert([
                'name' => ' やりたくない',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
          DB::table('choiceCategories')->insert([
                'name' => 'やった',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
         DB::table('choiceCategories')->insert([
                'name' => '特になし',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
