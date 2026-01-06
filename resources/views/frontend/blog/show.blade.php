@extends('layouts.frontend')

@section('content')
    <style>
        .blog-show-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .blog-show-hero h1 {
            color: var(--color-white);
            font-size: 2.5rem;
            margin-bottom: 15px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .blog-article {
            padding: 80px 0;
        }

        .article-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }

        .article-header {
            margin-bottom: 30px;
        }

        .article-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .article-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--color-text-light);
        }

        .article-meta i {
            color: var(--color-accent);
        }

        .article-image {
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .article-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .article-content {
            font-size: 1.1rem;
            line-height: 1.9;
            color: var(--color-text);
        }

        .article-content p {
            margin-bottom: 20px;
        }

        .article-content h2,
        .article-content h3 {
            margin: 30px 0 15px;
        }

        .article-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--color-border);
        }

        .tag {
            background: var(--color-light);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            color: var(--color-text-light);
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

        .related-posts {
            padding: 80px 0;
            background: var(--color-light);
        }

        @media (max-width: 1024px) {
            .article-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="blog-show-hero">
        <div class="container">
            <h1>{{ $post->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('blog') }}">Blog</a>
                <span>/</span>
                <span>{{ Str::limit($post->title, 30) }}</span>
            </div>
        </div>
    </section>

    <!-- Article -->
    <section class="blog-article">
        <div class="container">
            <div class="article-grid">
                <article>
                    <div class="article-header">
                        <div class="article-meta">
                            <span><i class="fas fa-calendar"></i> {{ $post->published_at->format('F d, Y') }}</span>
                            <span><i class="fas fa-user"></i> {{ $post->author?->name ?? 'Admin' }}</span>
                            @if($post->category)
                                <span><i class="fas fa-folder"></i> {{ $post->category->name }}</span>
                            @endif
                            <span><i class="fas fa-eye"></i> {{ $post->views }} views</span>
                        </div>
                    </div>

                    @if($post->featured_image)
                        <div class="article-image">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}">
                        </div>
                    @endif

                    <div class="article-content">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    @if($post->tags && count($post->tags) > 0)
                        <div class="article-tags">
                            <strong>Tags:</strong>
                            @foreach($post->tags as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif
                </article>

                <aside>
                    <div class="sidebar-widget">
                        <h4>Categories</h4>
                        <ul class="category-list" style="list-style: none;">
                            @foreach($categories as $category)
                                <li style="padding: 10px 0; border-bottom: 1px solid var(--color-border);">
                                    <a href="{{ route('blog.category', $category->slug) }}"
                                        style="display: flex; justify-content: space-between;">
                                        {{ $category->name }}
                                        <span
                                            style="background: var(--color-light); padding: 2px 10px; border-radius: 15px; font-size: 0.85rem;">
                                            {{ $category->posts_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
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

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <section class="related-posts">
            <div class="container">
                <div class="section-header">
                    <h2>Related Articles</h2>
                </div>
                <div class="grid-3">
                    @foreach($relatedPosts as $related)
                        <div class="blog-card"
                            style="background: var(--color-white); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-sm);">
                            <div style="height: 180px; overflow: hidden;">
                                @if($related->featured_image)
                                    <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400"
                                        alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div style="padding: 20px;">
                                <h3 style="font-size: 1.1rem; margin-bottom: 10px;">
                                    <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                                </h3>
                                <span style="color: var(--color-text-light); font-size: 0.85rem;">
                                    {{ $related->published_at->format('M d, Y') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection