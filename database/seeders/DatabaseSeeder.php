<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PracticeArea;
use App\Models\Testimonial;
use App\Models\BlogCategory;
use App\Models\SiteSetting;
use App\Models\SeoPage;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lawyer.com',
            'password' => Hash::make('password'),
        ]);

        // Create Practice Areas
        $practiceAreas = [
            [
                'title' => 'Criminal Defense',
                'slug' => 'criminal-defense',
                'icon' => 'fas fa-gavel',
                'short_description' => 'Expert defense for all criminal charges, from misdemeanors to felonies.',
                'description' => "Our criminal defense team provides aggressive representation for clients facing criminal charges. We understand that being accused of a crime can be one of the most stressful experiences of your life.\n\nWe handle all types of criminal cases including:\n- DUI/DWI\n- Drug offenses\n- Assault and battery\n- Theft and fraud\n- White-collar crimes\n\nOur experienced attorneys will fight to protect your rights and freedom.",
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Family Law',
                'slug' => 'family-law',
                'icon' => 'fas fa-users',
                'short_description' => 'Compassionate legal support for divorce, custody, and family matters.',
                'description' => "Family legal matters require sensitive handling and experienced guidance. Our family law attorneys provide compassionate support during difficult times.\n\nOur services include:\n- Divorce and separation\n- Child custody and support\n- Adoption\n- Prenuptial agreements\n- Domestic violence protection\n\nWe focus on achieving the best outcomes for you and your family.",
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Corporate Law',
                'slug' => 'corporate-law',
                'icon' => 'fas fa-building',
                'short_description' => 'Strategic legal solutions for businesses of all sizes.',
                'description' => "Our corporate law practice provides comprehensive legal services for businesses from startups to established corporations.\n\nWe assist with:\n- Business formation and structure\n- Contracts and agreements\n- Mergers and acquisitions\n- Corporate governance\n- Regulatory compliance\n\nWe become your trusted legal partner for all business needs.",
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Real Estate Law',
                'slug' => 'real-estate-law',
                'icon' => 'fas fa-home',
                'short_description' => 'Complete property transaction and dispute resolution services.',
                'description' => "Whether you're buying, selling, or dealing with property disputes, our real estate attorneys provide expert guidance.\n\nOur services cover:\n- Residential and commercial transactions\n- Title searches and insurance\n- Property disputes\n- Landlord-tenant issues\n- Zoning and land use\n\nWe ensure your property transactions are smooth and legally sound.",
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Immigration Law',
                'slug' => 'immigration-law',
                'icon' => 'fas fa-passport',
                'short_description' => 'Expert guidance through visa applications and citizenship processes.',
                'description' => "Navigating immigration laws can be complex and overwhelming. Our immigration attorneys help individuals and families achieve their American dream.\n\nWe handle:\n- Visa applications\n- Green card petitions\n- Citizenship and naturalization\n- Deportation defense\n- Employment-based immigration\n\nLet us guide you through the immigration process.",
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Civil Litigation',
                'slug' => 'civil-litigation',
                'icon' => 'fas fa-balance-scale',
                'short_description' => 'Strong representation in civil disputes and litigation matters.',
                'description' => "When disputes arise, our litigation team provides aggressive and effective representation in and out of the courtroom.\n\nWe handle:\n- Contract disputes\n- Personal injury claims\n- Employment disputes\n- Property disputes\n- Insurance claims\n\nWe fight to protect your interests and achieve favorable outcomes.",
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($practiceAreas as $area) {
            PracticeArea::create($area);
        }

        // Create Testimonials
        $testimonials = [
            [
                'client_name' => 'John Smith',
                'client_position' => 'Business Owner',
                'content' => 'Exceptional legal representation. The team handled my case with professionalism and achieved results beyond my expectations. I highly recommend their services.',
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Sarah Johnson',
                'client_position' => 'Teacher',
                'content' => 'During my divorce, they provided not just legal expertise but emotional support. I could not have asked for better representation during such a difficult time.',
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'CEO, Tech Corp',
                'content' => 'Their corporate law team helped us navigate complex regulations seamlessly. They are now our go-to legal advisors for all business matters.',
                'rating' => 5,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Create Blog Categories
        $categories = ['Legal News', 'Family Law Tips', 'Business Law', 'Criminal Defense', 'Real Estate'];
        foreach ($categories as $category) {
            BlogCategory::create(['name' => $category]);
        }

        // Site Settings
        $settings = [
            'site_name' => 'LegalPro',
            'site_tagline' => 'Attorney at Law',
            'email' => 'info@lawoffice.com',
            'phone' => '+1 (234) 567-890',
            'address' => '123 Legal Street, Law District, City, State 12345',
            'working_hours' => 'Mon - Fri: 9:00 AM - 6:00 PM',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create(['key' => $key, 'value' => $value]);
        }

        // SEO Pages
        $seoPages = [
            [
                'page_name' => 'Home Page',
                'page_url' => '/',
                'meta_title' => 'LegalPro Law Office | Expert Legal Services',
                'meta_description' => 'LegalPro provides expert legal services in criminal defense, family law, corporate law, and more. Schedule a free consultation today.',
                'meta_keywords' => 'law office, lawyer, attorney, legal services, criminal defense, family law',
                'is_active' => true,
            ],
            [
                'page_name' => 'About Us',
                'page_url' => '/about',
                'meta_title' => 'About LegalPro | Our Story & Experience',
                'meta_description' => 'Learn about LegalPro law office, our experienced team of attorneys, and our commitment to providing exceptional legal representation.',
                'meta_keywords' => 'about us, law firm history, experienced attorneys',
                'is_active' => true,
            ],
            [
                'page_name' => 'Services',
                'page_url' => '/services',
                'meta_title' => 'Our Practice Areas | LegalPro Law Services',
                'meta_description' => 'Explore our comprehensive legal services including criminal defense, family law, corporate law, real estate, and immigration law.',
                'meta_keywords' => 'legal services, practice areas, criminal law, family law, corporate law',
                'is_active' => true,
            ],
            [
                'page_name' => 'Portfolio',
                'page_url' => '/portfolio',
                'meta_title' => 'Case Studies | Successful Legal Outcomes',
                'meta_description' => 'Browse our successful case studies and see how we have helped clients achieve favorable legal outcomes across various practice areas.',
                'meta_keywords' => 'case studies, legal victories, successful cases',
                'is_active' => true,
            ],
            [
                'page_name' => 'Our Team',
                'page_url' => '/team',
                'meta_title' => 'Meet Our Attorneys | LegalPro Team',
                'meta_description' => 'Meet our experienced team of attorneys dedicated to providing exceptional legal representation and personalized service.',
                'meta_keywords' => 'attorneys, lawyers, legal team',
                'is_active' => true,
            ],
            [
                'page_name' => 'Blog',
                'page_url' => '/blog',
                'meta_title' => 'Legal Blog | News & Insights',
                'meta_description' => 'Stay informed with our legal blog featuring news, insights, and helpful tips on various legal topics.',
                'meta_keywords' => 'legal blog, law news, legal tips',
                'is_active' => true,
            ],
            [
                'page_name' => 'Contact Us',
                'page_url' => '/contact',
                'meta_title' => 'Contact LegalPro | Free Consultation',
                'meta_description' => 'Contact LegalPro law office for a free consultation. Get expert legal advice for your case today.',
                'meta_keywords' => 'contact lawyer, free consultation, legal help',
                'is_active' => true,
            ],
            [
                'page_name' => 'FAQ',
                'page_url' => '/faq',
                'meta_title' => 'Frequently Asked Questions | LegalPro',
                'meta_description' => 'Find answers to common legal questions about our services, processes, and how we can help with your case.',
                'meta_keywords' => 'FAQ, legal questions, law office FAQ',
                'is_active' => true,
            ],
        ];

        foreach ($seoPages as $seoPage) {
            SeoPage::create($seoPage);
        }
    }
}

