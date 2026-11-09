
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema as SchemaFacade;
use Illuminate\Support\Facades\DB as DBFacade;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom end_time sudah ada di database, jadi tidak ditambahkan lagi.
        if (!SchemaFacade::hasColumn('bookings', 'end_time')) {
            SchemaFacade::table('bookings', function (Blueprint $table) {
                $table->time('end_time')->nullable()->after('start_time');
            });
        }

        // Isi end_time untuk booking lama yang masih kosong.
        DBFacade::table('bookings')
            ->whereNull('end_time')
            ->orderBy('id')
            ->get()
            ->each(function ($booking) {
                $start = \Carbon\Carbon::parse($booking->start_time);

                DBFacade::table('bookings')
                    ->where('id', $booking->id)
                    ->update([
                        'end_time' => $start
                            ->copy()
                            ->addHours((int) $booking->duration)
                            ->format('H:i:s'),
                    ]);
            });
    }

    public function down(): void
    {
        // Jangan hapus kolom end_time karena sudah ada sebelumnya.
    }
};
