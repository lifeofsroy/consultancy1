<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_links')->insert([
            'name' => 'Facebook',
            'icon' => 'fab fa-facebook-f',
            'url' => 'https://www.facebook.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('social_links')->insert([
            'name' => 'Twitter',
            'icon' => 'fab fa-twitter',
            'url' => 'https://www.twitter.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('social_links')->insert([
            'name' => 'Linkedin',
            'icon' => 'fab fa-linkedin-in',
            'url' => 'https://www.linkedin.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('social_links')->insert([
            'name' => 'Whatsapp',
            'icon' => 'fab fa-whatsapp',
            'url' => 'https://www.whatsapp.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('social_links')->insert([
            'name' => 'Youtube',
            'icon' => 'fab fa-youtube',
            'url' => 'https://www.youtube.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
