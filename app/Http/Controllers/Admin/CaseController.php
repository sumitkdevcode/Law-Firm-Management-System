<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseController extends Controller
{
    public function index()
    {
        $cases = LegalCase::with('practiceArea')->latest()->paginate(10);
        return view('admin.cases.index', compact('cases'));
    }

    public function create()
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('admin.cases.create', compact('practiceAreas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'practice_area_id' => 'nullable|exists:practice_areas,id',
            'client_name' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'result' => 'nullable|string|max:255',
            'case_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('cases', 'public');
        }

        LegalCase::create($validated);

        return redirect()->route('admin.cases.index')
            ->with('success', 'Case created successfully.');
    }

    public function edit(LegalCase $case)
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('admin.cases.edit', compact('case', 'practiceAreas'));
    }

    public function update(Request $request, LegalCase $case)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'practice_area_id' => 'nullable|exists:practice_areas,id',
            'client_name' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'result' => 'nullable|string|max:255',
            'case_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('cases', 'public');
        }

        $case->update($validated);

        return redirect()->route('admin.cases.index')
            ->with('success', 'Case updated successfully.');
    }

    public function destroy(LegalCase $case)
    {
        $case->delete();
        return redirect()->route('admin.cases.index')
            ->with('success', 'Case deleted successfully.');
    }
}
