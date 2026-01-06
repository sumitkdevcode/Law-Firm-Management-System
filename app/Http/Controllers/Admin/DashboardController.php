<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\LegalCase;
use App\Models\PracticeArea;
use App\Models\TeamMember;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'contacts' => Contact::count(),
            'new_contacts' => Contact::new()->count(),
            'posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'cases' => LegalCase::count(),
            'practice_areas' => PracticeArea::count(),
            'team_members' => TeamMember::count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentPosts'));
    }
}
