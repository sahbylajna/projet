<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->delete();

        $countries = array(

        	// Records 01-99 (Afghanistan to India)

           array('iso' => 'BH', 'name' => 'Bahrain', 'iso3' => 'BHR', 'numcode' => '48', 'phonecode' => '973' , 'active' => '1'),





           array('iso' => 'KW', 'name' => 'Kuwait', 'iso3' => 'KWT', 'numcode' => '414', 'phonecode' => '965' , 'active' => '1'),

           array('iso' => 'QA', 'name' => 'Qatar', 'iso3' => 'QAT', 'numcode' => '634', 'phonecode' => '974', 'active' => '1' ),
               array('iso' => 'SA', 'name' => 'Saudi Arabia', 'iso3' => 'SAU', 'numcode' => '682', 'phonecode' => '966' , 'active' => '1'),


       array('iso' => 'AE', 'name' => 'United Arab Emirates', 'iso3' => 'ARE', 'numcode' => '784', 'phonecode' => '971' , 'active' => '1'),
             );

          DB::table('countries')->insert($countries);

    }
}
