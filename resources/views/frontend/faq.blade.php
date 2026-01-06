@extends('layouts.frontend')

@section('content')
    <style>
        .faq-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .faq-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .faq-section {
            padding: 100px 0;
        }

        .faq-item {
            background: var(--color-white);
            border-radius: 15px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .faq-question {
            padding: 20px 25px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(201, 162, 39, 0.05);
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(45deg);
        }

        .faq-answer {
            padding: 0 25px 0;
            color: var(--color-text-light);
            line-height: 1.7;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding-bottom: 20px;
            max-height: 500px;
        }
    </style>

    <!-- Page Header -->
    <section class="faq-hero">
        <div class="container">
            <h1>Frequently Asked Questions</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>FAQ</span>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Have Questions?</span>
                <h2>We Have Answers</h2>
                <p>Find answers to common legal questions below</p>
            </div>

            <div style="max-width: 800px; margin: 0 auto;">
                @forelse($faqs as $faq)
                    <div class="faq-item">
                        <div class="faq-question" onclick="this.parentElement.classList.toggle('active')">
                            {{ $faq->question }}
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="faq-answer">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @empty
                    <div style="text-align: center; padding: 60px;">
                        <i class="fas fa-question-circle"
                            style="font-size: 3rem; color: var(--color-accent); margin-bottom: 20px;"></i>
                        <h3>No FAQs Yet</h3>
                        <p>Check back soon for frequently asked questions.</p>
                    </div>
                @endforelse
            </div>

            <div style="text-align: center; margin-top: 60px;">
                <p style="color: var(--color-text-light); margin-bottom: 20px;">Can't find what you're looking for?</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-phone"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection