@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Add New User</h2>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control" required>
                        <small style="color: #666;">Minimum 8 characters</small>
                        @error('password')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm Password *</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Role *</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                        </select>
                        <small style="color: #666;">Admin: Full access | Editor: Limited access</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <div style="padding-top: 10px;">
                            <label class="form-check">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <span>Active - User can log in</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create User
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection