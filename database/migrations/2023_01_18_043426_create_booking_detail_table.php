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
        Schema::create('booking_detail', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->date('access_date')->nullable();
            $table->integer('price');
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
        Schema::dropIfExists('booking_detail');
    }
};
