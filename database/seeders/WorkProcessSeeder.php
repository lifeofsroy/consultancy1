<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_processes')->insert([
            'name' => 'Get Admission',
            'icon' => 'heroicon-o-user-circle',
            'desc' => 'Continua scale empowered metrics with cost effective innovation.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('work_processes')->insert([
            'name' => 'Choose Course',
            'icon' => 'heroicon-o-user-circle',
            'desc' => 'Continua scale empowered metrics with cost effective innovation.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('work_processes')->insert([
            'name' => 'Pass Test',
            'icon' => 'heroicon-o-user-circle',
            'desc' => 'Continua scale empowered metrics with cost effective innovation.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('work_processes')->insert([
            'name' => 'Make Your Carrer',
            'icon' => 'heroicon-o-user-circle',
            'desc' => 'Continua scale empowered metrics with cost effective innovation.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
