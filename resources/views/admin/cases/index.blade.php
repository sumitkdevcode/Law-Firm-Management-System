@extends('layouts.admin')

@section('title', 'Cases')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Cases / Portfolio</h2>
        <a href="{{ route('admin.cases.create') }}" class="btn btn-primary">
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
                            <th>Practice Area</th>
                            <th>Result</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cases as $case)
                            <tr>
                                <td>
                                    <strong>{{ $case->title }}</strong><br>
                                    <small style="color: #666;">{{ Str::limit($case->short_description, 40) }}</small>
                                </td>
                                <td>{{ $case->practiceArea?->title ?? 'N/A' }}</td>
                                <td>{{ $case->result ?? 'N/A' }}</td>
                                <td>
                                    @if($case->is_featured)
                                        <span class="badge badge-warning"><i class="fas fa-star"></i></span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($case->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.cases.edit', $case) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.cases.destroy', $case) }}" method="POST"
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
                                    <i class="fas fa-briefcase" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No cases yet. <a href="{{ route('admin.cases.create') }}">Create one</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $cases->links() }}
@endsection