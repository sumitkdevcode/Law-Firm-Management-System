@extends('layouts.frontend')

@section('content')
    <style>
        .case-detail-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .case-detail-hero h1 {
            color: var(--color-white);
            font-size: 2.5rem;
            margin-bottom: 15px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .case-content {
            padding: 100px 0;
        }

        .case-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }

        .case-image {
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .case-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .case-meta-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .meta-item {
            background: var(--color-light);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
        }

        .meta-item i {
            font-size: 2rem;
            color: var(--color-accent);
            margin-bottom: 15px;
        }

        .meta-item .label {
            font-size: 0.85rem;
            color: var(--color-text-light);
            margin-bottom: 5px;
        }

        .meta-item .value {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .case-description h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .case-description p {
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .result-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 50px;
            color: var(--color-white);
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: 20px;
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

        @media (max-width: 1024px) {
            .case-grid {
                grid-template-columns: 1fr;
            }

            .case-meta-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="case-detail-hero">
        <div class="container">
            <h1>{{ $case->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <span>/</span>
                <span>{{ Str::limit($case->title, 30) }}</span>
            </div>
        </div>
    </section>

    <!-- Case Content -->
    <section class="case-content">
        <div class="container">
            <div class="case-grid">
                <div class="case-main">
                    @if($case->featured_image)
                        <div class="case-image">
                            <img src="{{ asset('storage/' . $case->featured_image) }}" alt="{{ $case->title }}">
                        </div>
                    @endif

                    <div class="case-meta-grid">
                        @if($case->practiceArea)
                            <div class="meta-item">
                                <i class="{{ $case->practiceArea->icon ?? 'fas fa-gavel' }}"></i>
                                <div class="label">Practice Area</div>
                                <div class="value">{{ $case->practiceArea->title }}</div>
                            </div>
                        @endif
                        @if($case->case_date)
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <div class="label">Case Date</div>
                                <div class="value">{{ $case->case_date->format('M Y') }}</div>
                            </div>
                        @endif
                        @if($case->result)
                            <div class="meta-item">
                                <i class="fas fa-trophy"></i>
                                <div class="label">Result</div>
                                <div class="value">{{ $case->result }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="case-description">
                        <h3>Case Overview</h3>
                        <p>{{ $case->short_description }}</p>

                        <h3>Case Details</h3>
                        <div style="white-space: pre-line;">{{ $case->description }}</div>

                        @if($case->result)
                            <div class="result-badge">
                                <i class="fas fa-check-circle"></i>
                                {{ $case->result }}
                            </div>
                        @endif
                    </div>
                </div>

                <aside>
                    @if($case->practiceArea)
                        <div class="sidebar-widget">
                            <h4>Related Service</h4>
                            <div style="display: flex; gap: 15px; align-items: center;">
                                <div
                                    style="width: 60px; height: 60px; background: rgba(201, 162, 39, 0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; color: var(--color-accent); font-size: 1.5rem;">
                                    <i class="{{ $case->practiceArea->icon ?? 'fas fa-gavel' }}"></i>
                                </div>
                                <div>
                                    <strong>{{ $case->practiceArea->title }}</strong>
                                    <p style="color: var(--color-text-light); font-size: 0.9rem; margin: 0;">
                                        {{ Str::limit($case->practiceArea->short_description, 60) }}</p>
                                </div>
                            </div>
                            <a href="{{ route('services.show', $case->practiceArea->slug) }}" class="btn btn-secondary"
                                style="width: 100%; justify-content: center; margin-top: 20px;">
                                Learn More
                            </a>
                        </div>
                    @endif

                    <div class="sidebar-widget"
                        style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: white;">
                        <h4 style="border-color: var(--color-accent);">Need Legal Help?</h4>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 20px;">Have a similar case? Get a free
                            consultation from our expert attorneys.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary"
                            style="width: 100%; justify-content: center;">
                            <i class="fas fa-phone"></i> Contact Us
                        </a>
                    </div>

                    @if($relatedCases->count() > 0)
                        <div class="sidebar-widget">
                            <h4>Related Cases</h4>
                            @foreach($relatedCases as $related)
                                <div
                                    style="display: flex; gap: 15px; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid var(--color-border);">
                                    <div style="width: 80px; height: 60px; border-radius: 8px; overflow: hidden; flex-shrink: 0;">
                                        @if($related->featured_image)
                                            <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            <div style="width: 100%; height: 100%; background: var(--color-light);"></div>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('portfolio.show', $related->slug) }}"
                                            style="font-weight: 500; font-size: 0.95rem;">{{ Str::limit($related->title, 35) }}</a>
                                        @if($related->result)
                                            <div style="color: var(--color-accent); font-size: 0.8rem; margin-top: 5px;">
                                                {{ $related->result }}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>
@endsection