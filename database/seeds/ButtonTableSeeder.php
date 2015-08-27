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
        	'title' => 'Video 1 S1',
        	'tag' 	=> 'screen1video1',
            'screen' => '1',
        	'length'=> 57,
            'order' => 1,	
    	]);

    	Button::create([
        	'title' => 'Video 2 S1',
        	'tag' 	=> 'screen1video2',
            'screen' => '1',
        	'length'=> 30,
            'order' => 2,	
    	]);

    	Button::create([
        	'title' => 'Video 3 S1',
        	'tag' 	=> 'screen1video3',
            'screen' => '1',
        	'length'=> 45,
            'order' => 3,	
    	]);

        Button::create([
            'title' => 'Video 4 S1',
            'tag'   => 'screen1video4',
            'screen' => '1',
            'length'=> 5,
            'order' => 4,  
        ]);

        Button::create([
            'title' => 'Video 1 S2',
            'tag'   => 'screen2video1',
            'screen' => '2',
            'length'=> 57,
            'order' => 1,   
        ]);

        Button::create([
            'title' => 'Video 2 S2',
            'tag'   => 'screen2video2',
            'screen' => '2',
            'length'=> 30,
            'order' => 2,   
        ]);

        Button::create([
            'title' => 'Video 3 S2',
            'tag'   => 'screen2video3',
            'screen' => '2',
            'length'=> 45,
            'order' => 3,   
        ]);

        Button::create([
            'title' => 'Video 4 S2',
            'tag'   => 'screen2video4',
            'screen' => '2',
            'length'=> 5,
            'order' => 4,  
        ]);

        Button::create([
            'title' => 'Video 1 S3',
            'tag'   => 'screen3video1',
            'screen' => '3',
            'length'=> 57,
            'order' => 1,   
        ]);

        Button::create([
            'title' => 'Video 2 S3',
            'tag'   => 'screen3video2',
            'screen' => '3',
            'length'=> 30,
            'order' => 2,   
        ]);

        Button::create([
            'title' => 'Video 3 S3',
            'tag'   => 'screen3video3',
            'screen' => '3',
            'length'=> 45,
            'order' => 3,   
        ]);

        Button::create([
            'title' => 'Video 4 S3',
            'tag'   => 'screen3video4',
            'screen' => '3',
            'length'=> 5,
            'order' => 4,  
        ]);
    }
}
