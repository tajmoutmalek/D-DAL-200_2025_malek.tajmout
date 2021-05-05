<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
        	[
        		'title'=> 'Meeting',
        		'start' => '2021-04-21 15:00:00',
        	    'end' => '2021-04-21 16:00:00',
        	    'color' =>'#c40233',
        	    'description' => 'Meeting with teacher'
        	],
        	[
        		'title' => 'Masterclass',
        		'start' => '2021-04-24 9:30:00',
        	  'end' => '2021-04-24 10:00:00',
        	  'color' =>'#29fdf2',
        	  'description' => 'Accessibility'
        	]


        ]);
          }
}