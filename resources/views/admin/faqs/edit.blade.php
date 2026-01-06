@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit FAQ</h2>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Question *</label>
                    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}"
                        required>
                </div>

                <div class="form-group">
                    <label class="form-label">Answer *</label>
                    <textarea name="answer" class="form-control" rows="5"
                        required>{{ old('answer', $faq->answer) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Practice Area (Optional)</label>
                        <select name="practice_area_id" class="form-control">
                            <option value="">General FAQ</option>
                            @foreach($practiceAreas as $area)
                                <option value="{{ $area->id }}" {{ old('practice_area_id', $faq->practice_area_id) == $area->id ? 'selected' : '' }}>
                                    {{ $area->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
                        <span>Active</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update FAQ
                </button>
            </form>
        </div>
    </div>
@endsection