@extends('layouts.admin')

@section('title', 'Edit Case')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit Case</h2>
        <a href="{{ route('admin.cases.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.cases.update', $case) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $case->title) }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Practice Area</label>
                        <select name="practice_area_id" class="form-control">
                            <option value="">Select Practice Area</option>
                            @foreach($practiceAreas as $area)
                                <option value="{{ $area->id }}" {{ old('practice_area_id', $case->practice_area_id) == $area->id ? 'selected' : '' }}>
                                    {{ $area->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="client_name" class="form-control"
                            value="{{ old('client_name', $case->client_name) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Result</label>
                        <input type="text" name="result" class="form-control" value="{{ old('result', $case->result) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Short Description *</label>
                    <textarea name="short_description" class="form-control" rows="2"
                        required>{{ old('short_description', $case->short_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" class="form-control" rows="6"
                        required>{{ old('description', $case->description) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Featured Image</label>
                        @if($case->featured_image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $case->featured_image) }}" alt=""
                                    style="max-width: 200px; border-radius: 8px;">
                            </div>
                        @endif
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Case Date</label>
                        <input type="date" name="case_date" class="form-control"
                            value="{{ old('case_date', $case->case_date?->format('Y-m-d')) }}">
                    </div>
                </div>

                <div class="form-group" style="display: flex; gap: 30px;">
                    <label class="form-check">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $case->is_featured) ? 'checked' : '' }}>
                        <span>Featured</span>
                    </label>
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $case->is_active) ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Case
                </button>
            </form>
        </div>
    </div>
@endsection