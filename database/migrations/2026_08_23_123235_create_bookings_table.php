<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // User yang melakukan booking
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Lapangan yang dibooking
            $table->foreignId('venue_id')
                ->constrained()
                ->cascadeOnDelete();

            // Tanggal booking
            $table->date('booking_date');

            // Jam mulai
            $table->time('start_time');

            // Durasi dalam jam
            $table->integer('duration');

            // Total harga
            $table->decimal('total_price', 12, 2);

            // Status booking
            $table->string('status')
                ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};