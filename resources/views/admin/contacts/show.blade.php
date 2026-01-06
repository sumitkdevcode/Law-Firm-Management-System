@extends('layouts.admin')

@section('title', 'View Contact')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Contact Details</h2>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Message</h3>
                <span class="badge badge-{{ $contact->status_badge }}">{{ ucfirst($contact->status) }}</span>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 20px;">
                    <h4 style="margin-bottom: 10px;">{{ $contact->subject }}</h4>
                    <p style="color: #666; line-height: 1.8;">{{ $contact->message }}</p>
                </div>

                <div
                    style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                    <div>
                        <strong>Name:</strong><br>
                        <span style="color: #666;">{{ $contact->name }}</span>
                    </div>
                    <div>
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $contact->email }}" style="color: #c9a227;">{{ $contact->email }}</a>
                    </div>
                    <div>
                        <strong>Phone:</strong><br>
                        <span style="color: #666;">{{ $contact->phone ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <strong>Practice Area:</strong><br>
                        <span style="color: #666;">{{ $contact->practiceArea?->title ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <strong>Received:</strong><br>
                        <span style="color: #666;">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Status</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.status', $contact) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                                <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                <option value="closed" {{ $contact->status == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" class="form-control"
                                rows="4">{{ $contact->admin_notes }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-save"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="card" style="margin-top: 20px;">
                <div class="card-body" style="text-align: center;">
                    <a href="mailto:{{ $contact->email }}" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection