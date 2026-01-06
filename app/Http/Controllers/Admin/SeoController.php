<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoPage;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seoPages = SeoPage::orderBy('page_name')->paginate(20);
        return view('admin.seo.index', compact('seoPages'));
    }

    public function create()
    {
        return view('admin.seo.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'page_url' => 'required|string|max:255|unique:seo_pages',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:100',
            'og_description' => 'nullable|string|max:200',
            'og_image' => 'nullable|image|max:2048',
            'twitter_card' => 'nullable|string|in:summary,summary_large_image',
            'canonical_url' => 'nullable|url|max:255',
            'custom_head_scripts' => 'nullable|string',
            'no_index' => 'boolean',
            'no_follow' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Normalize URL
        $validated['page_url'] = '/' . ltrim($validated['page_url'], '/');
        if ($validated['page_url'] !== '/') {
            $validated['page_url'] = rtrim($validated['page_url'], '/');
        }

        // Handle image upload
        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        $validated['no_index'] = $request->has('no_index');
        $validated['no_follow'] = $request->has('no_follow');
        $validated['is_active'] = $request->has('is_active');

        SeoPage::create($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO page created successfully.');
    }

    public function edit(SeoPage $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, SeoPage $seo)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'page_url' => 'required|string|max:255|unique:seo_pages,page_url,' . $seo->id,
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:100',
            'og_description' => 'nullable|string|max:200',
            'og_image' => 'nullable|image|max:2048',
            'twitter_card' => 'nullable|string|in:summary,summary_large_image',
            'canonical_url' => 'nullable|url|max:255',
            'custom_head_scripts' => 'nullable|string',
            'no_index' => 'boolean',
            'no_follow' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Normalize URL
        $validated['page_url'] = '/' . ltrim($validated['page_url'], '/');
        if ($validated['page_url'] !== '/') {
            $validated['page_url'] = rtrim($validated['page_url'], '/');
        }

        // Handle image upload
        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('seo', 'public');
        }

        $validated['no_index'] = $request->has('no_index');
        $validated['no_follow'] = $request->has('no_follow');
        $validated['is_active'] = $request->has('is_active');

        $seo->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO page updated successfully.');
    }

    public function destroy(SeoPage $seo)
    {
        $seo->delete();
        return redirect()->route('admin.seo.index')->with('success', 'SEO page deleted successfully.');
    }
}
