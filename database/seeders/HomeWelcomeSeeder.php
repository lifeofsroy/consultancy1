<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeWelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_welcomes')->insert([
            'title' => 'Helping each other can make world better',
            'subtitle' => 'Who We Are',
            'desc' => 'Since children are the future of a country, it is important that we invest in them with all seriousness. Our SOPAN team works with children in extreme difficult circumstances, in various capacities and the team has been the backbone of the organisation. We work with underprivileged children in all their forms: working children, out-of-school children, begging children, children in difficult situations, etc. Our approach covers their needs from education, health and livelihood to rescuing and repatriation. SOPAN is manned by a team of experienced social workers and dedicated para-professionals. They serve as the backbone of all the projects being implemented by it in partnership with other organizations. Some of its team members once had been working’ children as well as the students of Sopan. They are truly the life-blood of the organization, keep it invigorated and growing.',
            'image' => 'home/welcome/image.png',
            'experience' => '16',
            'phone' => '7872289842',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
