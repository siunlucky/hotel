<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_complement', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->foreignId('complement_id')->references('id')->on('complements')->onDelete('cascade');
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
        Schema::dropIfExists('room_complement');
    }
};
