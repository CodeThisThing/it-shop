<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->integer('price');
            $table->string("Image");
            $table->string('Screen_info');
            $table->string('processor_info');
            $table->string('camera_info');
            $table->string('memory_info');
            $table->string('material_info');
            $table->bigInteger('id_category');
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
        Schema::dropIfExists('phones');
    }
}
