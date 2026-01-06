@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit User: {{ $user->name }}</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Details</h3>
            @if($user->id === auth()->id())
                <span class="badge badge-info">This is your account</span>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        @error('name')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                        <small style="color: #666;">Leave blank to keep current password</small>
                        @error('password')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Role *</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ old('role', $user->role ?? 'admin') === 'admin' ? 'selected' : '' }}>
                                Admin</option>
                            <option value="editor" {{ old('role', $user->role ?? 'admin') === 'editor' ? 'selected' : '' }}>
                                Editor</option>
                        </select>
                        <small style="color: #666;">Admin: Full access | Editor: Limited access</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div style="padding-top: 10px;">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
                                <span>Active - User can log in</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div style="background: #f8f9fa; border-radius: 8px; padding: 20px; margin-top: 20px;">
                    <h4 style="font-size: 1rem; margin-bottom: 15px; color: #666;">Account Information</h4>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; font-size: 0.9rem;">
                        <div>
                            <strong>Created:</strong><br>
                            {{ $user->created_at->format('M d, Y \a\t h:i A') }}
                        </div>
                        <div>
                            <strong>Last Updated:</strong><br>
                            {{ $user->updated_at->format('M d, Y \a\t h:i A') }}
                        </div>
                        <div>
                            <strong>User ID:</strong><br>
                            #{{ $user->id }}
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update User
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection