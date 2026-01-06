@extends('layouts.admin')

@section('title', 'Add Practice Area')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Add Practice Area</h2>
        <a href="{{ route('admin.practice-areas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.practice-areas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon (FontAwesome class)</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', 'fas fa-gavel') }}"
                            placeholder="fas fa-gavel">
                        <small style="color: #666;">e.g., fas fa-gavel, fas fa-users, fas fa-building</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Short Description *</label>
                    <textarea name="short_description" class="form-control" rows="2"
                        required>{{ old('short_description') }}</textarea>
                    @error('short_description')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" class="form-control" rows="6" required>{{ old('description') }}</textarea>
                    @error('description')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Practice Area
                </button>
            </form>
        </div>
    </div>
@endsection