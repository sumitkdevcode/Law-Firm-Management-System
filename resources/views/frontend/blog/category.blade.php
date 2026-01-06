@extends('layouts.frontend')

@section('content')
    <style>
        .blog-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .blog-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .blog-section {
            padding: 100px 0;
        }
    </style>

    <!-- Page Header -->
    <section class="blog-hero">
        <div class="container">
            <h1>Category: {{ $category->name }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('blog') }}">Blog</a>
                <span>/</span>
                <span>{{ $category->name }}</span>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="blog-grid" style="display: grid; grid-template-columns: 1fr 350px; gap: 50px;">
                <div class="posts-wrapper">
                    <div class="posts-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;">
                        @forelse($posts as $post)
                            <div class="blog-card"
                                style="background: var(--color-white); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-sm);">
                                <div style="height: 200px; overflow: hidden;">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400"
                                            alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                </div>
                                <div style="padding: 25px;">
                                    <div
                                        style="display: flex; gap: 15px; margin-bottom: 12px; font-size: 0.85rem; color: var(--color-text-light);">
                                        <span><i class="fas fa-calendar" style="color: var(--color-accent);"></i>
                                            {{ $post->published_at->format('M d, Y') }}</span>
                                    </div>
                                    <h3 style="font-size: 1.2rem; margin-bottom: 12px;">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p style="color: var(--color-text-light); font-size: 0.95rem; margin-bottom: 15px;">
                                        {{ Str::limit($post->excerpt, 100) }}</p>
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        style="color: var(--color-accent); font-weight: 600;">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div style="grid-column: span 2; text-align: center; padding: 60px;">
                                <p>No posts in this category yet.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($posts->hasPages())
                        <div class="pagination" style="display: flex; justify-content: center; gap: 10px; margin-top: 50px;">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>

                <aside class="sidebar" style="position: sticky; top: 150px;">
                    <div class="sidebar-widget"
                        style="background: var(--color-white); border-radius: 20px; padding: 30px; margin-bottom: 30px; box-shadow: var(--shadow-sm);">
                        <h4
                            style="font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid var(--color-accent);">
                            All Categories</h4>
                        <ul class="category-list" style="list-style: none;">
                            @foreach($categories as $cat)
                                <li style="padding: 12px 0; border-bottom: 1px solid var(--color-border);">
                                    <a href="{{ route('blog.category', $cat->slug) }}"
                                        style="display: flex; justify-content: space-between; {{ $cat->id == $category->id ? 'color: var(--color-accent); font-weight: 600;' : '' }}">
                                        {{ $cat->name }}
                                        <span
                                            style="background: var(--color-light); padding: 2px 10px; border-radius: 15px; font-size: 0.85rem;">
                                            {{ $cat->posts_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection