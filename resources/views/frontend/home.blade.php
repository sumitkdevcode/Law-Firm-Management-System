@extends('layouts.frontend')

@section('content')
    <style>
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            color: var(--color-white);
            margin-top: -130px;
            padding-top: 130px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.02' fill-rule='evenodd'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(201, 162, 39, 0.2);
            border: 1px solid rgba(201, 162, 39, 0.5);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            color: var(--color-accent);
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: 3.8rem;
            color: var(--color-white);
            margin-bottom: 25px;
            line-height: 1.15;
        }

        .hero h1 span {
            color: var(--color-accent);
        }

        .hero-text p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 50px;
        }

        .hero-stats {
            display: flex;
            gap: 50px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: var(--font-heading);
            font-size: 3rem;
            font-weight: 700;
            color: var(--color-accent);
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
        }

        .hero-floating-card {
            position: absolute;
            background: var(--color-white);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        .hero-floating-card.card-1 {
            bottom: 30px;
            left: -50px;
        }

        .hero-floating-card.card-2 {
            top: 30px;
            right: -30px;
            animation-delay: 1.5s;
        }

        .floating-card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .floating-card-title {
            font-family: var(--font-heading);
            font-size: 1.1rem;
            color: var(--color-primary);
            margin-bottom: 5px;
        }

        .floating-card-text {
            font-size: 0.85rem;
            color: var(--color-text-light);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* About Preview */
        .about-preview {
            padding: 120px 0;
            background: var(--color-white);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .about-image-wrapper {
            position: relative;
        }

        .about-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .about-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .experience-badge {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            color: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(201, 162, 39, 0.4);
        }

        .experience-badge .number {
            font-family: var(--font-heading);
            font-size: 3.5rem;
            font-weight: 700;
            display: block;
            line-height: 1;
        }

        .experience-badge span {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .about-text .subtitle {
            color: var(--color-accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            display: block;
        }

        .about-text h2 {
            font-size: 2.8rem;
            margin-bottom: 25px;
        }

        .about-text p {
            color: var(--color-text-light);
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .feature-item i {
            width: 24px;
            height: 24px;
            background: rgba(201, 162, 39, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-accent);
            font-size: 0.7rem;
        }

        .feature-item span {
            font-weight: 500;
            color: var(--color-text);
        }

        /* Practice Areas */
        .practice-areas {
            padding: 120px 0;
            background: var(--color-light);
        }

        .practice-card {
            background: var(--color-white);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .practice-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            transform: scaleX(0);
            transition: var(--transition);
        }

        .practice-card:hover::before {
            transform: scaleX(1);
        }

        .practice-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .practice-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(201, 162, 39, 0.1), rgba(201, 162, 39, 0.2));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: var(--color-accent);
            transition: var(--transition);
        }

        .practice-card:hover .practice-icon {
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            color: var(--color-white);
            transform: rotateY(180deg);
        }

        .practice-card h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .practice-card p {
            color: var(--color-text-light);
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .practice-link {
            color: var(--color-accent);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .practice-link:hover {
            gap: 12px;
        }

        /* Why Choose Us */
        .why-us {
            padding: 120px 0;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            color: var(--color-white);
            position: relative;
            overflow: hidden;
        }

        .why-us::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(201, 162, 39, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .why-us .section-header h2 {
            color: var(--color-white);
        }

        .why-us .section-header p {
            color: rgba(255, 255, 255, 0.7);
        }

        .reason-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: var(--transition);
            backdrop-filter: blur(10px);
        }

        .reason-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-10px);
        }

        .reason-number {
            font-family: var(--font-heading);
            font-size: 4rem;
            font-weight: 700;
            color: var(--color-accent);
            opacity: 0.3;
            position: absolute;
            top: 20px;
            right: 30px;
        }

        .reason-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 1.5rem;
            color: var(--color-white);
        }

        .reason-card h3 {
            color: var(--color-white);
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .reason-card p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        /* Testimonials */
        .testimonials {
            padding: 120px 0;
            background: var(--color-white);
        }

        .testimonial-card {
            background: var(--color-light);
            border-radius: 20px;
            padding: 40px;
            position: relative;
        }

        .testimonial-quote {
            font-size: 4rem;
            color: var(--color-accent);
            opacity: 0.2;
            position: absolute;
            top: 20px;
            right: 30px;
            font-family: Georgia, serif;
        }

        .testimonial-content {
            font-size: 1.1rem;
            color: var(--color-text);
            font-style: italic;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-accent);
        }

        .testimonial-info h4 {
            font-size: 1.1rem;
            margin-bottom: 3px;
        }

        .testimonial-info span {
            color: var(--color-text-light);
            font-size: 0.9rem;
        }

        .testimonial-rating {
            margin-left: auto;
            color: var(--color-accent);
        }

        /* Featured Cases */
        .featured-cases {
            padding: 120px 0;
            background: var(--color-light);
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

        .case-body {
            padding: 30px;
        }

        .case-body h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .case-body p {
            color: var(--color-text-light);
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .case-result {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            background: rgba(201, 162, 39, 0.1);
            border-radius: 10px;
            color: var(--color-accent);
            font-weight: 600;
        }

        /* Latest Blog */
        .latest-blog {
            padding: 120px 0;
            background: var(--color-white);
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
            height: 220px;
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
            padding: 30px;
        }

        .blog-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            font-size: 0.85rem;
            color: var(--color-text-light);
        }

        .blog-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .blog-meta i {
            color: var(--color-accent);
        }

        .blog-body h3 {
            font-size: 1.25rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .blog-body p {
            color: var(--color-text-light);
            font-size: 0.95rem;
            margin-bottom: 20px;
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

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            text-align: center;
        }

        .cta-section h2 {
            color: var(--color-white);
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-section .btn-primary {
            background: var(--color-white);
            color: var(--color-accent);
        }

        .cta-section .btn-primary:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-image {
                display: none;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .about-content {
                grid-template-columns: 1fr;
            }

            .about-image-wrapper {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-stats {
                flex-direction: column;
                gap: 30px;
            }

            .about-features {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <span class="hero-badge">
                        <i class="fas fa-award"></i>
                        Award Winning Law Firm
                    </span>
                    <h1>Protecting Your <span>Rights</span> With Dedication</h1>
                    <p>We provide exceptional legal representation with a commitment to achieving the best possible outcomes
                        for our clients. Trust our experienced team to guide you through complex legal matters.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('contact') }}" class="btn btn-primary">
                            <i class="fas fa-calendar-check"></i>
                            Free Consultation
                        </a>
                        <a href="{{ route('services') }}" class="btn btn-outline"
                            style="border-color: white; color: white;">
                            <i class="fas fa-arrow-right"></i>
                            Our Services
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">25+</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Cases Won</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Success Rate</span>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.stockcake.com/public/4/8/7/48798306-b939-47dd-9479-76773daf6fa6_large/lawyer-studying-documents-stockcake.jpg"
                        alt="Professional Lawyer">
                    <div class="hero-floating-card card-1">
                        <div class="floating-card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="floating-card-title">Trusted Protection</div>
                        <div class="floating-card-text">Your rights secured</div>
                    </div>
                    <div class="hero-floating-card card-2">
                        <div class="floating-card-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="floating-card-title">Top Rated</div>
                        <div class="floating-card-text">Best Law Firm 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Preview Section -->
    <section class="about-preview">
        <div class="container">
            <div class="about-content">
                <div class="about-image-wrapper">
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?w=600" alt="Law Office">
                    </div>
                    <div class="experience-badge">
                        <span class="number">25+</span>
                        <span>Years of<br>Excellence</span>
                    </div>
                </div>
                <div class="about-text">
                    <span class="subtitle">About Our Firm</span>
                    <h2>Dedicated to Justice, Committed to Excellence</h2>
                    <p>With over two decades of legal expertise, we have established ourselves as a leading law firm
                        committed to providing exceptional legal services. Our team of experienced attorneys specializes in
                        various practice areas, ensuring comprehensive legal support for all your needs.</p>
                    <p>We believe in building lasting relationships with our clients through trust, transparency, and
                        unwavering dedication to their cases.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Expert Legal Counsel</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Personalized Attention</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Proven Track Record</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>24/7 Availability</span>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="btn btn-primary">
                        <i class="fas fa-user"></i>
                        Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Practice Areas Section -->
    <section class="practice-areas">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">What We Do</span>
                <h2>Our Practice Areas</h2>
                <p>We offer comprehensive legal services across multiple practice areas to meet all your legal needs</p>
            </div>
            <div class="grid-3">
                @forelse($practiceAreas as $area)
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="{{ $area->icon ?? 'fas fa-gavel' }}"></i>
                        </div>
                        <h3>{{ $area->title }}</h3>
                        <p>{{ $area->short_description }}</p>
                        <a href="{{ route('services.show', $area->slug) }}" class="practice-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @empty
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <h3>Criminal Defense</h3>
                        <p>Expert defense for all criminal charges with aggressive representation</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Family Law</h3>
                        <p>Compassionate support for divorce, custody, and family matters</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Corporate Law</h3>
                        <p>Strategic legal solutions for businesses of all sizes</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Real Estate Law</h3>
                        <p>Complete property transaction and dispute resolution services</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-passport"></i>
                        </div>
                        <h3>Immigration Law</h3>
                        <p>Navigate complex immigration processes with expert guidance</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="practice-card">
                        <div class="practice-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h3>Civil Litigation</h3>
                        <p>Strong representation in civil disputes and litigation matters</p>
                        <a href="#" class="practice-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-us">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Why Choose Us</span>
                <h2>What Sets Us Apart</h2>
                <p>Experience the difference with our client-focused approach to legal representation</p>
            </div>
            <div class="grid-4">
                <div class="reason-card">
                    <div class="reason-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Expert Attorneys</h3>
                    <p>Highly qualified lawyers with extensive experience in their fields</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Client Focused</h3>
                    <p>Personalized attention and tailored strategies for each case</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock availability for urgent legal matters</p>
                </div>
                <div class="reason-card">
                    <div class="reason-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Proven Results</h3>
                    <p>Track record of successful case outcomes and satisfied clients</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Client Reviews</span>
                <h2>What Our Clients Say</h2>
                <p>Hear from clients who trusted us with their legal matters</p>
            </div>
            <div class="grid-3">
                @forelse($testimonials->take(3) as $testimonial)
                    <div class="testimonial-card">
                        <span class="testimonial-quote">"</span>
                        <p class="testimonial-content">{{ $testimonial->content }}</p>
                        <div class="testimonial-author">
                            @if($testimonial->client_image)
                                <img src="{{ asset('storage/' . $testimonial->client_image) }}"
                                    alt="{{ $testimonial->client_name }}" class="testimonial-avatar">
                            @else
                                <div class="testimonial-avatar"
                                    style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                    {{ substr($testimonial->client_name, 0, 1) }}
                                </div>
                            @endif
                            <div class="testimonial-info">
                                <h4>{{ $testimonial->client_name }}</h4>
                                <span>{{ $testimonial->client_position }}</span>
                            </div>
                            <div class="testimonial-rating">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="testimonial-card">
                        <span class="testimonial-quote">"</span>
                        <p class="testimonial-content">Exceptional legal representation. The team handled my case with
                            professionalism and achieved results beyond my expectations.</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar"
                                style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                J</div>
                            <div class="testimonial-info">
                                <h4>John Smith</h4>
                                <span>Business Owner</span>
                            </div>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <span class="testimonial-quote">"</span>
                        <p class="testimonial-content">During my divorce, they provided not just legal expertise but emotional
                            support. I couldn't have asked for better representation.</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar"
                                style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                S</div>
                            <div class="testimonial-info">
                                <h4>Sarah Johnson</h4>
                                <span>Teacher</span>
                            </div>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <span class="testimonial-quote">"</span>
                        <p class="testimonial-content">Their corporate law team helped us navigate complex regulations
                            seamlessly. Highly recommended for business legal needs.</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar"
                                style="background: var(--color-accent); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                M</div>
                            <div class="testimonial-info">
                                <h4>Michael Chen</h4>
                                <span>CEO, Tech Corp</span>
                            </div>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Featured Cases Section -->
    @if($featuredCases->count() > 0)
        <section class="featured-cases">
            <div class="container">
                <div class="section-header">
                    <span class="subtitle">Our Success Stories</span>
                    <h2>Featured Cases</h2>
                    <p>Browse through some of our notable case victories</p>
                </div>
                <div class="grid-4">
                    @foreach($featuredCases as $case)
                        <div class="case-card">
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
                            </div>
                            <div class="case-body">
                                <h3>{{ $case->title }}</h3>
                                <p>{{ Str::limit($case->short_description, 100) }}</p>
                                @if($case->result)
                                    <div class="case-result">
                                        <i class="fas fa-trophy"></i>
                                        {{ $case->result }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">
                        <i class="fas fa-folder-open"></i>
                        View All Cases
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Latest Blog Section -->
    <section class="latest-blog">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Legal Insights</span>
                <h2>Latest From Our Blog</h2>
                <p>Stay updated with legal news, tips, and insights from our experts</p>
            </div>
            <div class="grid-3">
                @forelse($latestPosts as $post)
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
                                <span><i class="fas fa-eye"></i> {{ $post->views }} views</span>
                            </div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->excerpt, 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400" alt="Blog Post">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i> Dec 15, 2024</span>
                                <span><i class="fas fa-eye"></i> 150 views</span>
                            </div>
                            <h3>Understanding Your Rights in Criminal Cases</h3>
                            <p>A comprehensive guide to knowing your rights when facing criminal charges...</p>
                            <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400" alt="Blog Post">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i> Dec 10, 2024</span>
                                <span><i class="fas fa-eye"></i> 120 views</span>
                            </div>
                            <h3>Top 5 Things to Know Before Filing for Divorce</h3>
                            <p>Essential considerations before starting the divorce process...</p>
                            <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400" alt="Blog Post">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="fas fa-calendar"></i> Dec 5, 2024</span>
                                <span><i class="fas fa-eye"></i> 200 views</span>
                            </div>
                            <h3>Business Legal Compliance: A Complete Guide</h3>
                            <p>Everything you need to know about keeping your business legally compliant...</p>
                            <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Get Legal Help?</h2>
            <p>Schedule a free consultation with our experienced attorneys today. Let us help you navigate your legal
                challenges with confidence.</p>
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-phone"></i>
                Schedule Free Consultation
            </a>
        </div>
    </section>
@endsection