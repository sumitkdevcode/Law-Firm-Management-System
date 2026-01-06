<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\PracticeArea;
use App\Models\SiteSetting;
use App\Mail\ContactAutoReply;
use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        $practiceAreas = PracticeArea::active()->ordered()->get();
        return view('frontend.contact', compact('practiceAreas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'practice_area_id' => 'nullable|exists:practice_areas,id',
            'message' => 'required|string|max:2000',
        ]);

        $contact = Contact::create($validated);

        // Send auto-reply email to the user
        try {
            Mail::to($contact->email)->send(new ContactAutoReply(
                $contact->name,
                $contact->subject
            ));
        } catch (\Exception $e) {
            Log::error('Failed to send auto-reply email: ' . $e->getMessage());
        }

        // Send notification email to admin
        try {
            $adminEmail = SiteSetting::get('email', 'admin@lawyer.com');
            Mail::to($adminEmail)->send(new ContactNotification($contact));
        } catch (\Exception $e) {
            Log::error('Failed to send admin notification email: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your message. We will get back to you shortly. A confirmation email has been sent to your inbox.');
    }
}

