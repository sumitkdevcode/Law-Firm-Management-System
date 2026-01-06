@extends('layouts.frontend')

@section('content')
    <style>
        .contact-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.95), rgba(22, 33, 62, 0.9)),
                url('https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=1920') center/cover;
            text-align: center;
        }

        .contact-hero h1 {
            color: var(--color-white);
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .contact-section {
            padding: 100px 0;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 60px;
        }

        .contact-info {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            border-radius: 20px;
            padding: 50px;
            color: var(--color-white);
        }

        .contact-info h3 {
            color: var(--color-white);
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .contact-info>p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
        }

        .info-item {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-icon {
            width: 55px;
            height: 55px;
            background: rgba(201, 162, 39, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-accent);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .info-content h4 {
            color: var(--color-white);
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .info-content p,
        .info-content a {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }

        .info-content a:hover {
            color: var(--color-accent);
        }

        .contact-social {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-social a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            transition: var(--transition);
        }

        .contact-social a:hover {
            background: var(--color-accent);
        }

        .contact-form-wrapper {
            background: var(--color-white);
            border-radius: 20px;
            padding: 50px;
            box-shadow: var(--shadow-lg);
        }

        .contact-form-wrapper h3 {
            font-size: 1.8rem;
            margin-bottom: 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--color-text);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid var(--color-border);
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--color-accent);
            box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.1);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            color: var(--color-white);
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(201, 162, 39, 0.4);
        }

        .map-section {
            padding: 0 0 100px;
        }

        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .map-wrapper iframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        @media (max-width: 1024px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- Page Header -->
    <section class="contact-hero">
        <div class="container">
            <h1>Contact Us</h1>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Contact</span>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <p>Have a legal question? Reach out to us and we'll get back to you as soon as possible.</p>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Our Office</h4>
                            <p>123 Legal Street, Law District<br>City, State 12345</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Phone Number</h4>
                            <a href="tel:+1234567890">+1 (234) 567-890</a><br>
                            <a href="tel:+1234567891">+1 (234) 567-891</a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email Address</h4>
                            <a href="mailto:info@lawoffice.com">info@lawoffice.com</a><br>
                            <a href="mailto:support@lawoffice.com">support@lawoffice.com</a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Working Hours</h4>
                            <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>

                    <div class="contact-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <h3>Send Us a Message</h3>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="+1 (234) 567-890">
                            </div>
                            <div class="form-group">
                                <label for="practice_area_id">Practice Area</label>
                                <select id="practice_area_id" name="practice_area_id">
                                    <option value="">Select a practice area</option>
                                    @foreach($practiceAreas as $area)
                                        <option value="{{ $area->id }}" {{ old('practice_area_id') == $area->id ? 'selected' : '' }}>
                                            {{ $area->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                placeholder="How can we help you?">
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" required
                                placeholder="Describe your legal matter...">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-wrapper">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648718453!2d-73.98784368459395!3d40.74844797932847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1635959372365!5m2!1sen!2sus"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection