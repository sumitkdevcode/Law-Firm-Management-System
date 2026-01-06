@extends('layouts.frontend')

@section('content')
    <style>
        .portfolio-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .portfolio-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .portfolio-section {
            padding: 100px 0;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 50px;
        }

        .filter-btn {
            padding: 12px 25px;
            background: var(--color-white);
            border: 2px solid var(--color-border);
            border-radius: 50px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--color-accent);
            border-color: var(--color-accent);
            color: var(--color-white);
        }

        .case-card {
            background: var(--color-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .case-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .case-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .case-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .case-card:hover .case-image img {
            transform: scale(1.1);
        }

        .case-category {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--color-accent);
            color: var(--color-white);
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .case-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(26, 26, 46, 0.9), transparent);
            display: flex;
            align-items: flex-end;
            padding: 25px;
            opacity: 0;
            transition: var(--transition);
        }

        .case-card:hover .case-overlay {
            opacity: 1;
        }

        .case-overlay a {
            width: 50px;
            height: 50px;
            background: var(--color-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-size: 1.2rem;
            margin-left: auto;
        }

        .case-body {
            padding: 25px;
        }

        .case-body h3 {
            font-size: 1.2rem;
            margin-bottom: 12px;
        }

        .case-body h3 a:hover {
            color: var(--color-accent);
        }

        .case-body p {
            color: var(--color-text-light);
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .case-result {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background: rgba(201, 162, 39, 0.1);
            border-radius: 50px;
            color: var(--color-accent);
            font-weight: 600;
            font-size: 0.9rem;
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
    </style>

    <!-- Page Header -->
    <section class="portfolio-hero">
        <div class="container">
            <h1>Our Cases</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Portfolio</span>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Success Stories</span>
                <h2>Featured Case Studies</h2>
                <p>Explore our track record of successful legal outcomes</p>
            </div>

            @if($practiceAreas->count() > 0)
                <div class="filter-tabs">
                    <button class="filter-btn active" data-filter="all">All Cases</button>
                    @foreach($practiceAreas as $area)
                        <button class="filter-btn" data-filter="{{ $area->slug }}">{{ $area->title }}</button>
                    @endforeach
                </div>
            @endif

            <div class="grid-3">
                @forelse($cases as $case)
                    <div class="case-card" data-category="{{ $case->practiceArea?->slug }}">
                        <div class="case-image">
                            @if($case->featured_image)
                                <img src="{{ asset('storage/' . $case->featured_image) }}" alt="{{ $case->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400"
                                    alt="{{ $case->title }}">
                            @endif
                            @if($case->practiceArea)
                                <span class="case-category">{{ $case->practiceArea->title }}</span>
                            @endif
                            <div class="case-overlay">
                                <a href="{{ route('portfolio.show', $case->slug) }}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="case-body">
                            <h3><a href="{{ route('portfolio.show', $case->slug) }}">{{ $case->title }}</a></h3>
                            <p>{{ Str::limit($case->short_description, 100) }}</p>
                            @if($case->result)
                                <span class="case-result">
                                    <i class="fas fa-trophy"></i>
                                    {{ $case->result }}
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="grid-column: span 3; text-align: center; padding: 60px;">
                        <i class="fas fa-folder-open"
                            style="font-size: 3rem; color: var(--color-accent); margin-bottom: 20px;"></i>
                        <h3>No Cases Yet</h3>
                        <p>Check back soon for our case studies and success stories.</p>
                    </div>
                @endforelse
            </div>

            @if($cases->hasPages())
                <div class="pagination">
                    {{ $cases->links() }}
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    const filter = this.dataset.filter;
                    document.querySelectorAll('.case-card').forEach(card => {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection