<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatDetailsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id');
            $table->integer('cat_id');
            $table->timestamps();
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_details');
    }
}
