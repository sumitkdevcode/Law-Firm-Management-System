@extends('layouts.admin')

@section('title', 'FAQs')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Frequently Asked Questions</h2>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Practice Area</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr>
                                <td>
                                    <strong>{{ Str::limit($faq->question, 50) }}</strong><br>
                                    <small style="color: #666;">{{ Str::limit($faq->answer, 60) }}</small>
                                </td>
                                <td>{{ $faq->practiceArea?->title ?? 'General' }}</td>
                                <td>{{ $faq->order }}</td>
                                <td>
                                    @if($faq->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
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
                                <td colspan="5" style="text-align: center; padding: 40px;">
                                    No FAQs yet. <a href="{{ route('admin.faqs.create') }}">Create one</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $faqs->links() }}
@endsection