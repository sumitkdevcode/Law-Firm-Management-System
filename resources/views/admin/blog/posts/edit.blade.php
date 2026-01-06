@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit Blog Post</h2>
        <a href="{{ route('admin.blog.posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blog.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Featured Image</label>
                        @if($post->featured_image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt=""
                                    style="max-width: 200px; border-radius: 8px;">
                            </div>
                        @endif
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Excerpt *</label>
                    <textarea name="excerpt" class="form-control" rows="2"
                        required>{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Content *</label>
                    <textarea name="content" class="form-control" rows="10"
                        required>{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Tags (comma separated)</label>
                    <input type="text" name="tags" class="form-control"
                        value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : '') }}">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                            value="{{ old('meta_title', $post->meta_title) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control"
                            value="{{ old('meta_description', $post->meta_description) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-check">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                        <span>Published</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Post
                </button>
            </form>
        </div>
    </div>
@endsection