<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons',function(Blueprint $table){
            $table->increments('id');
            $table->integer('button_bar_id')->unsigned();
            $table->foreign('button_bar_id')->references('id')->on('button_bars');
            $table->string('bulletin_GUID');
            $table->string('bulletin_name');
            $table->string('title');
            $table->string('icon');
            $table->string('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('buttons');
    }
}
