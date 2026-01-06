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

        .blog-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .blog-card {
            background: var(--color-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .blog-image {
            height: 200px;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .blog-card:hover .blog-image img {
            transform: scale(1.1);
        }

        .blog-body {
            padding: 25px;
        }

        .blog-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 12px;
            font-size: 0.85rem;
            color: var(--color-text-light);
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .blog-meta i {
            color: var(--color-accent);
        }

        .blog-body h3 {
            font-size: 1.2rem;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .blog-body h3 a:hover {
            color: var(--color-accent);
        }

        .blog-body p {
            color: var(--color-text-light);
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .read-more {
            color: var(--color-accent);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .read-more:hover {
            gap: 12px;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 150px;
        }

        .sidebar-widget {
            background: var(--color-white);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-sm);
        }

        .sidebar-widget h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--color-accent);
        }

        .category-list {
            list-style: none;
        }

        .category-list li {
            padding: 12px 0;
            border-bottom: 1px solid var(--color-border);
        }

        .category-list li:last-child {
            border-bottom: none;
        }

        .category-list a {
            display: flex;
            justify-content: space-between;
            color: var(--color-text);
        }

        .category-list a:hover {
            color: var(--color-accent);
        }

        .category-count {
            background: var(--color-light);
            padding: 2px 10px;
            border-radius: 15px;
            font-size: 0.85rem;
        }

        .recent-post {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .recent-post:last-child {
            margin-bottom: 0;
        }

        .recent-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .recent-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recent-content h5 {
            font-size: 0.95rem;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .recent-content h5 a:hover {
            color: var(--color-accent);
        }

        .recent-content span {
            font-size: 0.8rem;
            color: var(--color-text-light);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
        }

        .pagination a,
        .pagination span {
            padding: 12px 18px;
            background: var(--color-white);
            border-radius: 10px;
            border: 1px solid var(--color-border);
            color: var(--color-text);
            transition: var(--transition);
        }

        .pagination a:hover,
        .pagination .active {
            background: var(--color-accent);
            color: var(--color-white);
            border-color: var(--color-accent);
        }

        @media (max-width: 1024px) {
            .blog-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="blog-hero">
        <div class="container">
            <h1>Legal Blog</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Blog</span>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="blog-grid">
                <div class="posts-wrapper">
                    <div class="posts-grid">
                        @forelse($posts as $post)
                            <div class="blog-card">
                                <div class="blog-image">
                                    @if($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400"
                                            alt="{{ $post->title }}">
                                    @endif
                                </div>
                                <div class="blog-body">
                                    <div class="blog-meta">
                                        <span><i class="fas fa-calendar"></i> {{ $post->published_at->format('M d, Y') }}</span>
                                        @if($post->category)
                                            <span><i class="fas fa-folder"></i> {{ $post->category->name }}</span>
                                        @endif
                                    </div>
                                    <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p>{{ Str::limit($post->excerpt, 100) }}</p>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="read-more">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="blog-card" style="grid-column: span 2;">
                                <div class="blog-body" style="text-align: center; padding: 60px;">
                                    <i class="fas fa-newspaper"
                                        style="font-size: 3rem; color: var(--color-accent); margin-bottom: 20px;"></i>
                                    <h3>No Blog Posts Yet</h3>
                                    <p>Check back soon for legal insights and news.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if($posts->hasPages())
                        <div class="pagination">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>

                <aside class="sidebar">
                    <div class="sidebar-widget">
                        <h4>Categories</h4>
                        <ul class="category-list">
                            @forelse($categories as $category)
                                <li>
                                    <a href="{{ route('blog.category', $category->slug) }}">
                                        {{ $category->name }}
                                        <span class="category-count">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @empty
                                <li>No categories yet</li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h4>Recent Posts</h4>
                        @forelse($recentPosts as $recent)
                            <div class="recent-post">
                                <div class="recent-image">
                                    @if($recent->featured_image)
                                        <img src="{{ asset('storage/' . $recent->featured_image) }}" alt="{{ $recent->title }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=100"
                                            alt="{{ $recent->title }}">
                                    @endif
                                </div>
                                <div class="recent-content">
                                    <h5><a
                                            href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 50) }}</a>
                                    </h5>
                                    <span><i class="fas fa-calendar"></i> {{ $recent->published_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        @empty
                            <p>No recent posts</p>
                        @endforelse
                    </div>

                    <div class="sidebar-widget"
                        style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: white;">
                        <h4 style="border-color: var(--color-accent);">Need Legal Help?</h4>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 20px;">Get a free consultation from our
                            expert attorneys.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary"
                            style="width: 100%; justify-content: center;">
                            Contact Us
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection