<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        // Get SEO data for current URL
        $currentPath = '/' . ltrim(request()->path(), '/');
        if ($currentPath !== '/') {
            $currentPath = rtrim($currentPath, '/');
        }
        $seoPage = \App\Models\SeoPage::getForUrl($currentPath);

        // Set SEO values with fallbacks
        $pageTitle = $seoPage?->meta_title ?? $metaTitle ?? config('app.name', 'LegalPro Law Office');
        $pageDescription = $seoPage?->meta_description ?? $metaDescription ?? 'Expert legal services with decades of experience. We provide professional legal counsel in various practice areas.';
        $pageKeywords = $seoPage?->meta_keywords ?? $metaKeywords ?? '';
        $ogTitle = $seoPage?->effective_og_title ?? $pageTitle;
        $ogDescription = $seoPage?->effective_og_description ?? $pageDescription;
        $ogImage = $seoPage?->og_image ? asset('storage/' . $seoPage->og_image) : ($ogImage ?? '');
        $twitterCard = $seoPage?->twitter_card ?? 'summary_large_image';
        $canonicalUrl = $seoPage?->canonical_url ?? url()->current();
        $robots = $seoPage?->robots ?? 'index, follow';
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    @if($pageKeywords)
        <meta name="keywords" content="{{ $pageKeywords }}">
    @endif
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    @if($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
    @endif

    <!-- Twitter Card -->
    <meta name="twitter:card" content="{{ $twitterCard }}">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    @if($ogImage)
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endif

    <!-- Custom Head Scripts from SEO -->
    @if($seoPage?->custom_head_scripts)
        {!! $seoPage->custom_head_scripts !!}
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --color-primary: #1a1a2e;
            --color-secondary: #16213e;
            --color-accent: #c9a227;
            --color-accent-dark: #a88420;
            --color-text: #333;
            --color-text-light: #666;
            --color-text-lighter: #999;
            --color-white: #fff;
            --color-light: #f8f9fa;
            --color-border: #e0e0e0;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Inter', sans-serif;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 8px 30px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            color: var(--color-text);
            line-height: 1.7;
            background: var(--color-white);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
            font-weight: 600;
            line-height: 1.3;
            color: var(--color-primary);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--color-white);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .header.scrolled {
            box-shadow: var(--shadow-md);
        }

        .header-top {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 10px 0;
            font-size: 0.9rem;
        }

        .header-top-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-contact {
            display: flex;
            gap: 25px;
        }

        .header-contact a {
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-contact a:hover {
            color: var(--color-accent);
        }

        .header-social {
            display: flex;
            gap: 15px;
        }

        .header-social a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .header-social a:hover {
            color: var(--color-accent);
        }

        .header-main {
            padding: 15px 0;
        }

        .header-main-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-size: 1.5rem;
        }

        .logo-text h1 {
            font-size: 1.5rem;
            color: var(--color-primary);
            margin-bottom: -2px;
        }

        .logo-text span {
            font-size: 0.8rem;
            color: var(--color-text-light);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            gap: 35px;
            list-style: none;
        }

        .nav-menu a {
            font-weight: 500;
            color: var(--color-text);
            position: relative;
            padding: 5px 0;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-accent);
            transition: var(--transition);
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 100%;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--color-accent);
        }

        .header-cta {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
            color: var(--color-white);
            box-shadow: 0 4px 15px rgba(201, 162, 39, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201, 162, 39, 0.4);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--color-primary);
            color: var(--color-primary);
        }

        .btn-outline:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--color-primary);
            cursor: pointer;
        }

        /* Main Content */
        main {
            margin-top: 130px;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-header h1 {
            font-size: 3rem;
            color: var(--color-white);
            margin-bottom: 15px;
            position: relative;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.7);
            position: relative;
        }

        .breadcrumb a:hover {
            color: var(--color-accent);
        }

        /* Section Styles */
        .section {
            padding: 100px 0;
        }

        .section-light {
            background: var(--color-light);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header .subtitle {
            color: var(--color-accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.85rem;
            margin-bottom: 15px;
            display: block;
        }

        .section-header h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .section-header p {
            color: var(--color-text-light);
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        /* Card Styles */
        .card {
            background: var(--color-white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .card-img {
            height: 220px;
            overflow: hidden;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .card:hover .card-img img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 1.3rem;
            margin-bottom: 12px;
        }

        .card-text {
            color: var(--color-text-light);
            font-size: 0.95rem;
        }

        /* Grid Layouts */
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        /* Footer */
        .footer {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 80px 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 50px;
            margin-bottom: 60px;
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.7);
            margin: 20px 0 30px;
            line-height: 1.8;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
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

        .footer-social a:hover {
            background: var(--color-accent);
            transform: translateY(-3px);
        }

        .footer h4 {
            color: var(--color-white);
            font-size: 1.2rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .footer h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--color-accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-links a:hover {
            color: var(--color-accent);
            padding-left: 5px;
        }

        .footer-contact li {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-contact i {
            color: var(--color-accent);
            font-size: 1.1rem;
            margin-top: 3px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .grid-3 {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header-top {
                display: none;
            }

            main {
                margin-top: 80px;
            }

            .mobile-toggle {
                display: block;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: 0;
                right: 0;
                background: var(--color-white);
                flex-direction: column;
                padding: 30px;
                gap: 20px;
                box-shadow: var(--shadow-lg);
                transform: translateX(-100%);
                transition: var(--transition);
            }

            .nav-menu.active {
                transform: translateX(0);
            }

            .header-cta .btn {
                display: none;
            }

            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="header-top">
            <div class="container">
                <div class="header-top-content">
                    <div class="header-contact">
                        <a href="tel:+1234567890"><i class="fas fa-phone"></i> +1 (234) 567-890</a>
                        <a href="mailto:info@lawoffice.com"><i class="fas fa-envelope"></i> info@lawoffice.com</a>
                    </div>
                    <div class="header-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="header-main-content">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="logo-text">
                            <h1>LegalPro</h1>
                            <span>Attorney at Law</span>
                        </div>
                    </a>
                    <nav>
                        <ul class="nav-menu" id="navMenu">
                            <li><a href="{{ route('home') }}"
                                    class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                            <li><a href="{{ route('services') }}"
                                    class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>
                            <li><a href="{{ route('portfolio') }}"
                                    class="{{ request()->routeIs('portfolio*') ? 'active' : '' }}">Cases</a></li>
                            <li><a href="{{ route('team') }}"
                                    class="{{ request()->routeIs('team*') ? 'active' : '' }}">Team</a></li>
                            <li><a href="{{ route('blog') }}"
                                    class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}"
                                    class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="header-cta">
                        <a href="{{ route('contact') }}" class="btn btn-primary">
                            <i class="fas fa-calendar-check"></i>
                            Free Consultation
                        </a>
                        <button class="mobile-toggle" onclick="toggleMenu()">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="logo-text">
                            <h1 style="color: white;">LegalPro</h1>
                            <span style="color: rgba(255,255,255,0.7);">Attorney at Law</span>
                        </div>
                    </a>
                    <p>Providing exceptional legal services with integrity, dedication, and personalized attention to
                        every client's needs.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i> Practice Areas</a>
                        </li>
                        <li><a href="{{ route('portfolio') }}"><i class="fas fa-chevron-right"></i> Case Studies</a>
                        </li>
                        <li><a href="{{ route('team') }}"><i class="fas fa-chevron-right"></i> Our Team</a></li>
                        <li><a href="{{ route('blog') }}"><i class="fas fa-chevron-right"></i> Legal Blog</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Practice Areas</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Criminal Law</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Family Law</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Corporate Law</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Real Estate</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Immigration</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Civil Litigation</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Contact Info</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Legal Street, Law District, City, State 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+1 (234) 567-890<br>+1 (234) 567-891</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@lawoffice.com<br>support@lawoffice.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 2:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; {{ date('Y') }} LegalPro Law Office. All rights reserved. | Designed with <i
                        class="fas fa-heart" style="color: var(--color-accent);"></i></p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function () {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        function toggleMenu() {
            document.getElementById('navMenu').classList.toggle('active');
        }

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>