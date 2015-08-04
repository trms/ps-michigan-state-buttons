<?php

use App\User;
use Illuminate\Database\Seeder;

class User_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['email'=>'admin@trms.com','password'=>bcrypt('trms')]);

        User::create(['email'=>'seth.phillips@trms.com','password'=>bcrypt('trms')]);
    }
}
