<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\VenueMaintenance;
use Illuminate\Http\Request;

class VenueMaintenanceController extends Controller
{
    /**
     * Menampilkan daftar maintenance untuk satu lapangan.
     */
    public function index(Venue $venue)
    {
        $maintenances = $venue->maintenances()
            ->orderByDesc('start_date')
            ->get();

        return view(
            'admin.venues.maintenance',
            compact('venue', 'maintenances')
        );
    }

    /**
     * Menyimpan jadwal maintenance baru.
     */
    public function store(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:500',
        ], [
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'end_date.required' => 'Tanggal selesai wajib diisi.',
            'end_date.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
            'reason.required' => 'Keterangan perbaikan wajib diisi.',
            'reason.max' => 'Keterangan maksimal 500 karakter.',
        ]);

        $venue->maintenances()->create([
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'reason' => $validated['reason'],
            'status' => 'scheduled',
        ]);

        return redirect()
            ->route('admin.venues.maintenance.index', $venue)
            ->with('success', 'Jadwal maintenance berhasil ditambahkan.');
    }

    /**
     * Menghapus jadwal maintenance.
     */
    public function destroy(VenueMaintenance $maintenance)
    {
        $venueId = $maintenance->venue_id;

        $maintenance->delete();

        return redirect()
            ->route('admin.venues.maintenance.index', $venueId)
            ->with('success', 'Jadwal maintenance berhasil dihapus.');
    }
}

