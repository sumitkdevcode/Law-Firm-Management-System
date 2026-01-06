@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Blog Posts</h2>
        <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>
                                    <strong>{{ Str::limit($post->title, 40) }}</strong><br>
                                    <small style="color: #666;">{{ $post->created_at->format('M d, Y') }}</small>
                                </td>
                                <td>{{ $post->category?->name ?? 'Uncategorized' }}</td>
                                <td>{{ $post->author?->name ?? 'Unknown' }}</td>
                                <td>{{ $post->views }}</td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blog.posts.destroy', $post) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px;">
                                    <i class="fas fa-newspaper" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                    <p>No posts yet. <a href="{{ route('admin.blog.posts.create') }}">Create one</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $posts->links() }}
@endsection