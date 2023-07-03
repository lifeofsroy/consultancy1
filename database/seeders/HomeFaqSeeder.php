<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_faqs')->insert([
            'subtitle' => 'Common Questions',
            'title' => 'Talk To Us About Any Question?',
            'image' => 'home/faq/image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
