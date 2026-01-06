@extends('layouts.frontend')

@section('content')
    <style>
        .about-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .about-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .about-hero .breadcrumb {
            justify-content: center;
        }

        .story-section {
            padding: 100px 0;
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .story-images {
            position: relative;
        }

        .story-img-main {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .story-img-main img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .story-img-secondary {
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 250px;
            border-radius: 15px;
            overflow: hidden;
            border: 8px solid var(--color-white);
            box-shadow: var(--shadow-lg);
        }

        .story-img-secondary img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .story-content .subtitle {
            color: var(--color-accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            display: block;
        }

        .story-content h2 {
            font-size: 2.5rem;
            margin-bottom: 25px;
        }

        .story-content p {
            color: var(--color-text-light);
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .value-item {
            display: flex;
            gap: 15px;
            padding: 20px;
            background: var(--color-light);
            border-radius: 15px;
        }

        .value-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .value-text h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .value-text p {
            font-size: 0.9rem;
            color: var(--color-text-light);
            margin: 0;
        }

        /* Timeline */
        .timeline-section {
            padding: 100px 0;
            background: var(--color-light);
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 3px;
            height: 100%;
            background: var(--color-accent);
        }

        .timeline-item {
            display: flex;
            margin-bottom: 50px;
            position: relative;
        }

        .timeline-item:nth-child(odd) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            width: 45%;
            background: var(--color-white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
        }

        .timeline-year {
            color: var(--color-accent);
            font-weight: 700;
            font-family: var(--font-heading);
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .timeline-content h4 {
            margin-bottom: 10px;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: var(--color-accent);
            border-radius: 50%;
            border: 4px solid var(--color-white);
            box-shadow: var(--shadow-sm);
        }

        /* Team Section */
        .team-section {
            padding: 100px 0;
        }

        .team-card {
            background: var(--color-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .team-image {
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .team-card:hover .team-image img {
            transform: scale(1.1);
        }

        .team-social {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            transition: var(--transition);
        }

        .team-card:hover .team-social {
            bottom: 20px;
        }

        .team-social a {
            width: 40px;
            height: 40px;
            background: var(--color-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-primary);
            transition: var(--transition);
        }

        .team-social a:hover {
            background: var(--color-accent);
            color: var(--color-white);
        }

        .team-info {
            padding: 25px;
            text-align: center;
        }

        .team-info h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .team-info span {
            color: var(--color-accent);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .story-grid {
                grid-template-columns: 1fr;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .timeline::before {
                left: 20px;
            }

            .timeline-item {
                flex-direction: row !important;
                padding-left: 50px;
            }

            .timeline-content {
                width: 100%;
            }

            .timeline-dot {
                left: 20px;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="about-hero">
        <div class="container">
            <h1>About Us</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>About</span>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="story-section">
        <div class="container">
            <div class="story-grid">
                <div class="story-images">
                    <div class="story-img-main">
                        <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?w=600" alt="Our Office">
                    </div>
                    <div class="story-img-secondary">
                        <img src="https://images.unsplash.com/photo-1556157382-97ede2916cd4?w=300" alt="Team Meeting">
                    </div>
                </div>
                <div class="story-content">
                    <span class="subtitle">Our Story</span>
                    <h2>A Legacy of Legal Excellence</h2>
                    <p>Founded in 1999, LegalPro has grown from a small practice to one of the region's most respected law
                        firms. Our journey began with a simple vision: to provide exceptional legal services with integrity
                        and dedication.</p>
                    <p>Over the past 25 years, we have successfully represented thousands of clients across various legal
                        matters, building a reputation for excellence and unwavering commitment to justice.</p>

                    <div class="values-grid">
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="value-text">
                                <h4>Integrity</h4>
                                <p>Upholding the highest ethical standards</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="value-text">
                                <h4>Excellence</h4>
                                <p>Striving for the best outcomes</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="value-text">
                                <h4>Compassion</h4>
                                <p>Understanding client needs</p>
                            </div>
                        </div>
                        <div class="value-item">
                            <div class="value-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="value-text">
                                <h4>Teamwork</h4>
                                <p>Collaborative approach to cases</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="timeline-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Our Journey</span>
                <h2>Milestones</h2>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">1999</div>
                        <h4>Firm Founded</h4>
                        <p>Established as a solo practice with a vision to provide accessible legal services.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2005</div>
                        <h4>Team Expansion</h4>
                        <p>Grew to a team of 10 attorneys, expanding practice areas.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2012</div>
                        <h4>Regional Recognition</h4>
                        <p>Awarded "Best Law Firm" by the State Bar Association.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h4>Continued Excellence</h4>
                        <p>Celebrating 25 years with over 500 successful cases.</p>
                    </div>
                    <div class="timeline-dot"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Our Team</span>
                <h2>Meet Our Attorneys</h2>
                <p>Experienced legal professionals dedicated to your success</p>
            </div>
            <div class="grid-4">
                @forelse($teamMembers as $member)
                    <div class="team-card">
                        <div class="team-image">
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1556157382-97ede2916cd4?w=400"
                                    alt="{{ $member->name }}">
                            @endif
                            <div class="team-social">
                                @if($member->linkedin)
                                    <a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if($member->twitter)
                                    <a href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}"><i class="fas fa-envelope"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>{{ $member->name }}</h3>
                            <span>{{ $member->position }}</span>
                        </div>
                    </div>
                @empty
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1556157382-97ede2916cd4?w=400" alt="Team Member">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>James Wilson</h3>
                            <span>Senior Partner</span>
                        </div>
                    </div>
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400" alt="Team Member">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>Sarah Mitchell</h3>
                            <span>Family Law Attorney</span>
                        </div>
                    </div>
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400" alt="Team Member">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>Michael Chen</h3>
                            <span>Corporate Law Expert</span>
                        </div>
                    </div>
                    <div class="team-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400" alt="Team Member">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>Emily Rodriguez</h3>
                            <span>Criminal Defense</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection