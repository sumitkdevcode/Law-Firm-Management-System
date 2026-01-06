@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Edit Category</h2>
        <a href="{{ route('admin.blog.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="card" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('admin.blog.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Category Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                    @error('name')<small style="color: #dc3545;">{{ $message }}</small>@enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Category
                </button>
            </form>
        </div>
    </div>
@endsection