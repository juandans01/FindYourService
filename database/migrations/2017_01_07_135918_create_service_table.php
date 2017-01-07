<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('services', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('zip_code');
            $table->float('geo_lat');
            $table->float('geo_long');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
