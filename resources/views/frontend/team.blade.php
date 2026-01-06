@extends('layouts.frontend')

@section('content')
    <style>
        .team-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .team-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

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
            height: 320px;
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
            bottom: -60px;
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
            width: 45px;
            height: 45px;
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
            padding: 30px;
            text-align: center;
        }

        .team-info h3 {
            font-size: 1.4rem;
            margin-bottom: 8px;
        }

        .team-info h3 a:hover {
            color: var(--color-accent);
        }

        .team-info .position {
            color: var(--color-accent);
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 15px;
            display: block;
        }

        .team-info p {
            color: var(--color-text-light);
            font-size: 0.95rem;
        }
    </style>

    <!-- Page Header -->
    <section class="team-hero">
        <div class="container">
            <h1>Our Team</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Team</span>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header">
                <span class="subtitle">Meet Our Attorneys</span>
                <h2>Experienced Legal Experts</h2>
                <p>Our team of dedicated attorneys brings decades of combined experience to serve your legal needs</p>
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
                                    <a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if($member->twitter)
                                    <a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}"><i class="fas fa-envelope"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="team-info">
                            <h3><a href="{{ route('team.show', $member->slug) }}">{{ $member->name }}</a></h3>
                            <span class="position">{{ $member->position }}</span>
                            <p>{{ Str::limit($member->bio, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: span 4; text-align: center; padding: 60px;">
                        <i class="fas fa-users" style="font-size: 3rem; color: var(--color-accent); margin-bottom: 20px;"></i>
                        <h3>Team Members Coming Soon</h3>
                        <p>We're preparing our team profiles. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection