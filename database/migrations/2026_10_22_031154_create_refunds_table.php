
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->decimal('amount', 12, 2);

            $table->text('reason');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'refunded',
            ])->default('pending');

            $table->text('admin_note')->nullable();

            $table->foreignId('processed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('requested_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('refunded_at')->nullable();

            $table->timestamps();

            // Satu booking hanya memiliki satu pengajuan refund.
            $table->unique('booking_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
