@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Add Testimonial</h2>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Client Name *</label>
                        <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Position</label>
                        <input type="text" name="client_position" class="form-control" value="{{ old('client_position') }}"
                            placeholder="e.g., CEO, Business Owner">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Company</label>
                        <input type="text" name="client_company" class="form-control" value="{{ old('client_company') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Client Photo</label>
                        <input type="file" name="client_image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Testimonial Content *</label>
                    <textarea name="content" class="form-control" rows="4" required>{{ old('content') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Rating *</label>
                        <select name="rating" class="form-control" required>
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }}
                                    Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
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
                    <i class="fas fa-save"></i> Save Testimonial
                </button>
            </form>
        </div>
    </div>
@endsection