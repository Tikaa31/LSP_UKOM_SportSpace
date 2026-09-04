<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::latest()->get();

        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
        ]);

        Sport::create($validated);

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil ditambahkan!');
    }

    public function edit(Sport $sport)
    {
        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
        ]);

        $sport->update($validated);

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil diperbarui!');
    }

    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil dihapus!');
    }
}