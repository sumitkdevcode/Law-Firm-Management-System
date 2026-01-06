@extends('layouts.frontend')

@section('content')
    <style>
        .team-member-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .team-member-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .team-member-content {
            padding: 100px 0;
        }

        .member-grid {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 60px;
            align-items: start;
        }

        .member-image-section {
            position: sticky;
            top: 120px;
        }

        .member-photo {
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: var(--shadow-lg);
        }

        .member-photo img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .member-contact-card {
            background: var(--color-white);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--color-border);
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-item i {
            width: 45px;
            height: 45px;
            background: rgba(201, 162, 39, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-accent);
        }

        .member-info {
            padding-top: 20px;
        }

        .member-info .position {
            color: var(--color-accent);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 20px;
            display: block;
        }

        .member-info h2 {
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .member-bio {
            color: var(--color-text-light);
            line-height: 1.9;
            margin-bottom: 40px;
        }

        .member-bio p {
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            background: var(--color-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-primary);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--color-accent);
            color: var(--color-white);
        }

        @media (max-width: 1024px) {
            .member-grid {
                grid-template-columns: 1fr;
            }

            .member-image-section {
                position: static;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="team-member-hero">
        <div class="container">
            <h1>{{ $member->name }}</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('team') }}">Team</a>
                <span>/</span>
                <span>{{ $member->name }}</span>
            </div>
        </div>
    </section>

    <!-- Member Content -->
    <section class="team-member-content">
        <div class="container">
            <div class="member-grid">
                <div class="member-image-section">
                    <div class="member-photo">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1556157382-97ede2916cd4?w=400"
                                alt="{{ $member->name }}">
                        @endif
                    </div>

                    <div class="member-contact-card">
                        @if($member->email)
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <small style="color: var(--color-text-light);">Email</small>
                                    <a href="mailto:{{ $member->email }}"
                                        style="display: block;">{{ $member->email }}</a>
                                </div>
                            </div>
                        @endif
                        @if($member->phone)
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <small style="color: var(--color-text-light);">Phone</small>
                                    <a href="tel:{{ $member->phone }}" style="display: block;">{{ $member->phone }}</a>
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('contact') }}" class="btn btn-primary"
                            style="width: 100%; justify-content: center; margin-top: 20px;">
                            <i class="fas fa-calendar"></i> Schedule Consultation
                        </a>
                    </div>
                </div>

                <div class="member-info">
                    <span class="position">{{ $member->position }}</span>
                    <h2>About {{ $member->name }}</h2>

                    <div class="member-bio">
                        <p>{{ $member->bio }}</p>
                        @if($member->full_bio)
                            <div style="white-space: pre-line;">{{ $member->full_bio }}</div>
                        @endif
                    </div>

                    @if($member->linkedin || $member->twitter)
                        <h3 style="margin-bottom: 15px;">Connect with {{ $member->name }}</h3>
                        <div class="social-links">
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
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Other Team Members -->
    @if($otherMembers->count() > 0)
        <section style="padding: 80px 0; background: var(--color-light);">
            <div class="container">
                <div class="section-header">
                    <h2>Other Team Members</h2>
                </div>
                <div class="grid-4">
                    @foreach($otherMembers as $member)
                        <div class="team-card"
                            style="background: var(--color-white); border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-sm);">
                            <div style="height: 250px; overflow: hidden;">
                                @if($member->image)
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <img src="https://images.unsplash.com/photo-1556157382-97ede2916cd4?w=400" alt="{{ $member->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div style="padding: 25px; text-align: center;">
                                <h3 style="font-size: 1.2rem; margin-bottom: 5px;">
                                    <a href="{{ route('team.show', $member->slug) }}">{{ $member->name }}</a>
                                </h3>
                                <span style="color: var(--color-accent); font-size: 0.9rem;">{{ $member->position }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection