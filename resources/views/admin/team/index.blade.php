@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Team Members</h2>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teamMembers as $member)
                            <tr>
                                <td>
                                    @if($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" alt=""
                                            style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <div
                                            style="width: 50px; height: 50px; border-radius: 50%; background: #c9a227; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                            {{ strtoupper(substr($member->name, 0, 1)) }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $member->name }}</strong><br>
                                    <small style="color: #666;">{{ $member->email ?? '-' }}</small>
                                </td>
                                <td>{{ $member->position }}</td>
                                <td>{{ $member->order }}</td>
                                <td>
                                    @if($member->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $member) }}" method="POST"
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
                                    <i class="fas fa-users" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No team members yet. <a href="{{ route('admin.team.create') }}">Create one</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $teamMembers->links() }}
@endsection