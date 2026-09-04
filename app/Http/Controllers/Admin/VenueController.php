<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::with('sport')
            ->latest()
            ->get();

        return view(
            'admin.venues.index',
            compact('venues')
        );
    }


    public function create()
    {
        $sports = Sport::orderBy('name')->get();

        return view(
            'admin.venues.create',
            compact('sports')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
            'price_per_hour' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('venues', 'public');

        }


        $validated['rating'] = $validated['rating'] ?? 0;


        Venue::create($validated);


        return redirect()
            ->route('admin.venues.index')
            ->with(
                'success',
                'Lapangan berhasil ditambahkan.'
            );
    }


    public function edit(Venue $venue)
    {
        $sports = Sport::orderBy('name')->get();

        return view(
            'admin.venues.edit',
            compact('venue', 'sports')
        );
    }


    public function update(
        Request $request,
        Venue $venue
    ) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
            'price_per_hour' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('image')) {

            if (
                $venue->image &&
                Storage::disk('public')->exists($venue->image)
            ) {
                Storage::disk('public')->delete(
                    $venue->image
                );
            }


            $validated['image'] = $request
                ->file('image')
                ->store('venues', 'public');

        }


        $validated['rating'] = $validated['rating'] ?? 0;


        $venue->update($validated);


        return redirect()
            ->route('admin.venues.index')
            ->with(
                'success',
                'Lapangan berhasil diperbarui.'
            );
    }


    public function destroy(Venue $venue)
    {
        if (
            $venue->image &&
            Storage::disk('public')->exists($venue->image)
        ) {
            Storage::disk('public')->delete(
                $venue->image
            );
        }


        $venue->delete();


        return redirect()
            ->route('admin.venues.index')
            ->with(
                'success',
                'Lapangan berhasil dihapus.'
            );
    }
}