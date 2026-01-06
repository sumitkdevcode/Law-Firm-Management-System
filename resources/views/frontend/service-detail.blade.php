@extends('layouts.frontend')

@section('content')
    <style>
        .service-detail-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .service-detail-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .service-content {
            padding: 100px 0;
        }

        .service-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }

        .service-main h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .service-main p {
            color: var(--color-text-light);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .service-icon-large {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--color-white);
            margin-bottom: 30px;
        }

        .service-sidebar-widget {
            background: var(--color-white);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-sm);
        }

        .service-sidebar-widget h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--color-accent);
        }

        .faq-section {
            padding: 100px 0;
            background: var(--color-light);
        }

        .faq-item {
            background: var(--color-white);
            border-radius: 15px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .faq-question {
            padding: 20px 25px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question:hover {
            background: rgba(201, 162, 39, 0.05);
        }

        .faq-answer {
            padding: 0 25px 20px;
            color: var(--color-text-light);
            line-height: 1.7;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        @media (max-width: 1024px) {
            .service-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="service-detail-hero">
        <div class="container">
            <h1>{{ $practiceArea->title }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}">Services</a>
                <span>/</span>
                <span>{{ $practiceArea->title }}</span>
            </div>
        </div>
    </section>

    <!-- Service Content -->
    <section class="service-content">
        <div class="container">
            <div class="service-grid">
                <div class="service-main">
                    <div class="service-icon-large">
                        <i class="{{ $practiceArea->icon ?? 'fas fa-gavel' }}"></i>
                    </div>
                    <h2>About {{ $practiceArea->title }}</h2>
                    @if($practiceArea->image)
                        <img src="{{ asset('storage/' . $practiceArea->image) }}" alt="{{ $practiceArea->title }}"
                            style="width: 100%; border-radius: 15px; margin-bottom: 30px;">
                    @endif
                    <div style="white-space: pre-line;">{{ $practiceArea->description }}</div>
                </div>

                <aside>
                    <div class="service-sidebar-widget">
                        <h4>All Practice Areas</h4>
                        <ul style="list-style: none;">
                            @php
                                $allAreas = \App\Models\PracticeArea::active()->ordered()->get();
                            @endphp
                            @foreach($allAreas as $area)
                                <li style="padding: 12px 0; border-bottom: 1px solid var(--color-border);">
                                    <a href="{{ route('services.show', $area->slug) }}"
                                        style="{{ $area->id == $practiceArea->id ? 'color: var(--color-accent); font-weight: 600;' : '' }}">
                                        <i class="{{ $area->icon ?? 'fas fa-gavel' }}"
                                            style="width: 25px; color: var(--color-accent);"></i>
                                        {{ $area->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="service-sidebar-widget"
                        style="background: linear-gradient(135deg, var(--color-primary), var(--color-secondary)); color: white;">
                        <h4 style="border-color: var(--color-accent);">Need Help?</h4>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 20px;">Get a free consultation for your
                            {{ strtolower($practiceArea->title) }} case.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary"
                            style="width: 100%; justify-content: center;">
                            <i class="fas fa-phone"></i> Contact Us
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- FAQs -->
    @if($faqs->count() > 0)
        <section class="faq-section">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Common Questions</span>
                    <h2>{{ $practiceArea->title }} FAQs</h2>
                </div>
                <div style="max-width: 800px; margin: 0 auto;">
                    @foreach($faqs as $faq)
                        <div class="faq-item">
                            <div class="faq-question" onclick="this.parentElement.classList.toggle('active')">
                                {{ $faq->question }}
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="faq-answer">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Related Cases -->
    @if($relatedCases->count() > 0)
        <section style="padding: 100px 0;">
            <div class="container">
                <div class="section-header">
                    <h2>Related Case Studies</h2>
                </div>
                <div class="grid-4">
                    @foreach($relatedCases as $case)
                        <div class="case-card"
                            style="background: var(--color-white); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-sm);">
                            <div style="height: 180px; overflow: hidden;">
                                @if($case->featured_image)
                                    <img src="{{ asset('storage/' . $case->featured_image) }}" alt="{{ $case->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=400"
                                        alt="{{ $case->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div style="padding: 20px;">
                                <h3 style="font-size: 1rem; margin-bottom: 10px;">{{ $case->title }}</h3>
                                @if($case->result)
                                    <span
                                        style="color: var(--color-accent); font-weight: 600; font-size: 0.85rem;">{{ $case->result }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection