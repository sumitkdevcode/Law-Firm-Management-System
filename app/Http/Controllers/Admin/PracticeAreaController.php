<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PracticeAreaController extends Controller
{
    public function index()
    {
        $practiceAreas = PracticeArea::ordered()->paginate(10);
        return view('admin.practice-areas.index', compact('practiceAreas'));
    }

    public function create()
    {
        return view('admin.practice-areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('practice-areas', 'public');
        }

        PracticeArea::create($validated);

        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Practice area created successfully.');
    }

    public function edit(PracticeArea $practiceArea)
    {
        return view('admin.practice-areas.edit', compact('practiceArea'));
    }

    public function update(Request $request, PracticeArea $practiceArea)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('practice-areas', 'public');
        }

        $practiceArea->update($validated);

        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Practice area updated successfully.');
    }

    public function destroy(PracticeArea $practiceArea)
    {
        $practiceArea->delete();
        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Practice area deleted successfully.');
    }
}
