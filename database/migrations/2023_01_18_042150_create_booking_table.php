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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('id');
            $table->integer('booking_number');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('guest_name');
            $table->integer('total_room');
            $table->foreignId('id_type_room');
            $table->enum('booking_status', ['baru', 'check_in', 'check_out']);
            $table->foreignId('id_user');
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
        Schema::dropIfExists('booking');
    }
};
