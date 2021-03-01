<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pro_id');
            $table->integer('cat_id');
            $table->timestamps();
            $table->foreign('pro_id')->references('Sn')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_detail');
    }
}
