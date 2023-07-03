<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_infos')->insert([
            'phone' => '7872289842',
            'email' => 'contact@sroywebstudio.com',
            'address' => 'Baburbag, Burdwan, West Bengal, 713104',
            'mapurl' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.655586807877!2d87.88629291533832!3d23.219219014775632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8485158dee683%3A0x361ba96d2d38d055!2sAlisha%20Bus%20Stand!5e0!3m2!1sen!2sin!4v1677064320707!5m2!1sen!2sin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
