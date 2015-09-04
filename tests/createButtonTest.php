<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class createButtonTest extends TestCase
{
    use WithoutMiddleware;
     use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_create_a_button()
    {  
        $this->errors = null;      
        $this->visit('admin/button/create');
        $this->assertResponseOk();
    }

}