@extends('layouts.admin')

@section('title', 'Add Blog Post')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Add Blog Post</h2>
        <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Excerpt *</label>
                    <textarea name="excerpt" class="form-control" rows="2" required>{{ old('excerpt') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Content *</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Tags (comma separated)</label>
                    <input type="text" name="tags" class="form-control" value="{{ old('tags') }}"
                        placeholder="law, divorce, criminal">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control"
                            value="{{ old('meta_description') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                        <span>Publish immediately</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Post
                </button>
            </form>
        </div>
    </div>
@endsection