@extends('layouts.admin')

@section('title', 'Contact Inquiries')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Contact Inquiries</h2>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Contact</th>
                            <th>Subject</th>
                            <th>Practice Area</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>
                                    <strong>{{ $contact->name }}</strong><br>
                                    <small style="color: #666;">{{ $contact->email }}</small><br>
                                    @if($contact->phone)
                                        <small style="color: #666;">{{ $contact->phone }}</small>
                                    @endif
                                </td>
                                <td>{{ Str::limit($contact->subject, 30) }}</td>
                                <td>{{ $contact->practiceArea?->title ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge badge-{{ $contact->status_badge }}">
                                        {{ ucfirst($contact->status) }}
                                    </span>
                                </td>
                                <td>{{ $contact->created_at->format('M d, Y') }}<br>
                                    <small style="color: #666;">{{ $contact->created_at->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px;">
                                    <i class="fas fa-envelope" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No contact inquiries yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $contacts->links() }}
@endsection