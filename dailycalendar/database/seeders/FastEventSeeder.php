<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FastEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('fast_events')->insert([
        	[
        		'title'=> 'TEPITECH',
        		'start' => '2021-01-01 10:00:00',
        	    'end' => '2021-01-01 13:00:00',
        	    'color' =>'#c40233',
                'description' => ''
        	   
        	],
        	[
        		'title' => '[WORKSHOP] L`IA',
        		'start' => ' 2021-01-01 17:00:00',
        	  'end' => ' 2021-01-01 19:30:00',
        	  'color' =>'#29fdf2',
              'description' => ''

        
        	]


        ]);
    }
}
