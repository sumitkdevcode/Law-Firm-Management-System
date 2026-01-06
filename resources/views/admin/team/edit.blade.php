@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit Team Member</h2>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.team.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $teamMember->name) }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Position *</label>
                        <input type="text" name="position" class="form-control"
                            value="{{ old('position', $teamMember->position) }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $teamMember->email) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $teamMember->phone) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Short Bio *</label>
                    <textarea name="bio" class="form-control" rows="3"
                        required>{{ old('bio', $teamMember->bio) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Full Biography</label>
                    <textarea name="full_bio" class="form-control"
                        rows="5">{{ old('full_bio', $teamMember->full_bio) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Photo</label>
                        @if($teamMember->image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $teamMember->image) }}" alt=""
                                    style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control"
                            value="{{ old('order', $teamMember->order) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" name="linkedin" class="form-control"
                            value="{{ old('linkedin', $teamMember->linkedin) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Twitter URL</label>
                        <input type="url" name="twitter" class="form-control"
                            value="{{ old('twitter', $teamMember->twitter) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Team Member
                </button>
            </form>
        </div>
    </div>
@endsection