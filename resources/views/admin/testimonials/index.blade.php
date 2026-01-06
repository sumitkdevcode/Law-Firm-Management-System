@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Testimonials</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Content</th>
                            <th>Rating</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <strong>{{ $testimonial->client_name }}</strong><br>
                                    <small style="color: #666;">{{ $testimonial->client_position }}</small>
                                </td>
                                <td>{{ Str::limit($testimonial->content, 60) }}</td>
                                <td>
                                    @for($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="fas fa-star" style="color: #c9a227;"></i>
                                    @endfor
                                </td>
                                <td>{{ $testimonial->order }}</td>
                                <td>
                                    @if($testimonial->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
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
                                    <i class="fas fa-quote-right"
                                        style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No testimonials yet. <a href="{{ route('admin.testimonials.create') }}">Create one</a>
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $testimonials->links() }}
@endsection