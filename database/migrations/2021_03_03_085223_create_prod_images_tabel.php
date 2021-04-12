<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdImagesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id');
            $table->string('p_image');
            $table->timestamps();
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_images');
    }
}
