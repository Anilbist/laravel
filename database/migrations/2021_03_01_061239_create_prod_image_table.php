<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_image', function (Blueprint $table) {
            $table->increments('sn');
            $table->unsignedInteger('p_id');
            $table->string('p_image');
            $table->timestamps();

            $table->foreign('p_id')->references('Sn')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_image');
    }
}
