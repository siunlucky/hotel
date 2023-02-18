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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id');
            $table->integer('booking_number');
            $table->string('booking_name');
            $table->string('booking_email');
            $table->string('booking_phone');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('total_room');
            $table->foreignId('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->enum('booking_status', ['requested', 'approved', 'check_in', 'check_out', 'cancelled']);
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
};
