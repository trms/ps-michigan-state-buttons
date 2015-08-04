<?php

use App\Button;
use Illuminate\Database\Seeder;

class ButtonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Button::create([
        	'title' => 'Video 1',
        	'tag' 	=> 'video1',
        	'length'=> 57,
            'order' => 1,	
    	]);

    	Button::create([
        	'title' => 'Video 2',
        	'tag' 	=> 'video2',
        	'length'=> 30,
            'order' => 2,	
    	]);

    	Button::create([
        	'title' => 'Video 3',
        	'tag' 	=> 'video3',
        	'length'=> 45,
            'order' => 3,	
    	]);

        Button::create([
            'title' => 'Video 4',
            'tag'   => 'video4',
            'length'=> 5,
            'order' => 4,  
        ]);
    }
}
