<?php

namespace App\Http\Controllers;

use App\Models\PracticeArea;
use App\Models\LegalCase;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\TeamMember;
use App\Models\Faq;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $practiceAreas = PracticeArea::active()->ordered()->take(6)->get();
        $featuredCases = LegalCase::active()->featured()->latest()->take(4)->get();
        $testimonials = Testimonial::active()->ordered()->take(6)->get();
        $latestPosts = BlogPost::published()->latest('published_at')->take(3)->get();
        $teamMembers = TeamMember::active()->ordered()->take(4)->get();
        $faqs = Faq::active()->ordered()->take(6)->get();

        return view('frontend.home', compact(
            'practiceAreas',
            'featuredCases',
            'testimonials',
            'latestPosts',
            'teamMembers',
            'faqs'
        ));
    }
}
