<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_bins', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->unsignedBigInteger('bin_id');         
            $table->unsignedBigInteger('booking_id');         
            $table->foreign('bin_id')->references('id')->on('bins')->onDelete('cascade');           
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_bins');
    }
};
