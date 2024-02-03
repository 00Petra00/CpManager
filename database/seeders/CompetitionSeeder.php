<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('competitions')->insert([
            'name' => 'Competition1',
            'year' => '2024',
            'description' => 'This is the Competition One description'
        ]);
        DB::table('competitions')->insert([
            'name' => 'Competition2',
            'year' => '2024',
            'description' => 'This is the Competition Two description'
        ]);
    }
}
