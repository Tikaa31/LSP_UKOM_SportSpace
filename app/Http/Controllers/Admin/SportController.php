<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::withCount('venues')
            ->latest()
            ->get();

        return view('admin.sports.index', compact('sports'));
    }

    public function create()
    {
        return view('admin.sports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:sports,name',
            ],
            'icon' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['name']);

        $validated['icon'] = $request->file('icon')
            ->store('sports', 'public');

        Sport::create($validated);

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil ditambahkan.');
    }

    public function edit(Sport $sport)
    {
        return view('admin.sports.edit', compact('sport'));
    }

    public function update(Request $request, Sport $sport)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('sports', 'name')->ignore($sport->id),
            ],
            'icon' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['name'],
            $sport->id
        );

        if ($request->hasFile('icon')) {
            $newIcon = $request->file('icon')
                ->store('sports', 'public');

            if (
                $sport->icon &&
                Storage::disk('public')->exists($sport->icon)
            ) {
                Storage::disk('public')->delete($sport->icon);
            }

            $validated['icon'] = $newIcon;
        } else {
            unset($validated['icon']);
        }

        $sport->update($validated);

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil diperbarui.');
    }

    public function destroy(Sport $sport)
    {
        if ($sport->venues()->exists()) {
            return redirect()
                ->route('admin.sports.index')
                ->with('error', 'Olahraga tidak bisa dihapus karena masih memiliki lapangan.');
        }

        $sport->delete();

        return redirect()
            ->route('admin.sports.index')
            ->with('success', 'Olahraga berhasil dihapus.');
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (
            Sport::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
