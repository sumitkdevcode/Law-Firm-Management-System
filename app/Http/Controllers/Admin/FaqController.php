<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PracticeArea;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('practiceArea')->ordered()->paginate(15);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('admin.faqs.create', compact('practiceAreas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'practice_area_id' => 'nullable|exists:practice_areas,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('admin.faqs.edit', compact('faq', 'practiceAreas'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'practice_area_id' => 'nullable|exists:practice_areas,id',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}
