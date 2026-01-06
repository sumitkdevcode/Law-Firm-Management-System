@extends('layouts.admin')

@section('title', 'Practice Areas')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Practice Areas</h2>
        <a href="{{ route('admin.practice-areas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($practiceAreas as $area)
                            <tr>
                                <td>
                                    <strong>{{ $area->title }}</strong><br>
                                    <small style="color: #666;">{{ Str::limit($area->short_description, 50) }}</small>
                                </td>
                                <td>
                                    <i class="{{ $area->icon ?? 'fas fa-gavel' }}"
                                        style="font-size: 1.5rem; color: #c9a227;"></i>
                                </td>
                                <td>{{ $area->order }}</td>
                                <td>
                                    @if($area->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.practice-areas.edit', $area) }}"
                                            class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.practice-areas.destroy', $area) }}" method="POST"
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
                                    <i class="fas fa-gavel" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No practice areas yet. <a href="{{ route('admin.practice-areas.create') }}">Create
                                            one</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $practiceAreas->links() }}
@endsection