@extends('layouts.frontend')

@section('content')
    <style>
        .services-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .services-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .services-section {
            padding: 100px 0;
        }

        .service-card {
            background: var(--color-white);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            transform: scaleY(0);
            transition: var(--transition);
        }

        .service-card:hover::before {
            transform: scaleY(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(201, 162, 39, 0.1), rgba(201, 162, 39, 0.2));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--color-accent);
            margin-bottom: 25px;
            transition: var(--transition);
        }

        .service-card:hover .service-icon {
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            color: var(--color-white);
        }

        .service-card h3 {
            font-size: 1.4rem;
            margin-bottom: 15px;
        }

        .service-card p {
            color: var(--color-text-light);
            margin-bottom: 25px;
            line-height: 1.7;
        }

        .service-link {
            color: var(--color-accent);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .service-link:hover {
            gap: 12px;
        }

        .cta-box {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            border-radius: 20px;
            padding: 60px;
            text-align: center;
            margin-top: 60px;
        }

        .cta-box h3 {
            color: var(--color-white);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .cta-box p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
    </style>

    <!-- Page Header -->
    <section class="services-hero">
        <div class="container">
            <h1>Our Services</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Services</span>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Practice Areas</span>
                <h2>Legal Services We Offer</h2>
                <p>Comprehensive legal solutions tailored to your specific needs</p>
            </div>
            <div class="grid-3">
                @forelse($practiceAreas as $area)
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $area->icon ?? 'fas fa-gavel' }}"></i>
                        </div>
                        <h3>{{ $area->title }}</h3>
                        <p>{{ $area->short_description }}</p>
                        <a href="{{ route('services.show', $area->slug) }}" class="service-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @empty
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-gavel"></i></div>
                        <h3>Criminal Defense</h3>
                        <p>Expert defense representation for all types of criminal charges, from misdemeanors to felonies.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-users"></i></div>
                        <h3>Family Law</h3>
                        <p>Compassionate legal support for divorce, child custody, adoption, and other family matters.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-building"></i></div>
                        <h3>Corporate Law</h3>
                        <p>Strategic legal solutions for businesses including contracts, mergers, and compliance.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-home"></i></div>
                        <h3>Real Estate Law</h3>
                        <p>Complete property legal services including transactions, disputes, and title issues.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-passport"></i></div>
                        <h3>Immigration Law</h3>
                        <p>Expert guidance through visa applications, green cards, and citizenship processes.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-balance-scale"></i></div>
                        <h3>Civil Litigation</h3>
                        <p>Strong representation in civil disputes, personal injury, and contract litigation.</p>
                        <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                @endforelse
            </div>

            <div class="cta-box">
                <h3>Need Legal Assistance?</h3>
                <p>Contact us today for a free consultation and let us help you navigate your legal challenges.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-phone"></i>
                    Get Free Consultation
                </a>
            </div>
        </div>
    </section>
@endsection