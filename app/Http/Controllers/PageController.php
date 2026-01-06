<?php

namespace App\Http\Controllers;

use App\Models\PracticeArea;
use App\Models\LegalCase;
use App\Models\TeamMember;
use App\Models\Faq;

class PageController extends Controller
{
    public function about()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('frontend.about', compact('teamMembers'));
    }

    public function services()
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('frontend.services', compact('practiceAreas'));
    }

    public function serviceDetail($slug)
    {
        $practiceArea = PracticeArea::where('slug', $slug)->active()->firstOrFail();
        $relatedCases = $practiceArea->cases()->active()->latest()->take(4)->get();
        $faqs = $practiceArea->faqs()->active()->ordered()->get();

        return view('frontend.service-detail', compact('practiceArea', 'relatedCases', 'faqs'));
    }

    public function portfolio()
    {
        $cases = LegalCase::active()->latest()->paginate(9);
        $practiceAreas = PracticeArea::active()->ordered()->get();

        return view('frontend.portfolio', compact('cases', 'practiceAreas'));
    }

    public function caseDetail($slug)
    {
        $case = LegalCase::where('slug', $slug)->active()->firstOrFail();
        $relatedCases = LegalCase::active()
            ->where('id', '!=', $case->id)
            ->where('practice_area_id', $case->practice_area_id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.case-detail', compact('case', 'relatedCases'));
    }

    public function team()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('frontend.team', compact('teamMembers'));
    }

    public function teamMember($slug)
    {
        $member = TeamMember::where('slug', $slug)->active()->firstOrFail();
        $otherMembers = TeamMember::active()->where('id', '!=', $member->id)->ordered()->take(3)->get();

        return view('frontend.team-member', compact('member', 'otherMembers'));
    }

    public function faq()
    {
        $faqs = Faq::active()->ordered()->get();
        $practiceAreas = PracticeArea::active()->ordered()->get();

        return view('frontend.faq', compact('faqs', 'practiceAreas'));
    }
}
