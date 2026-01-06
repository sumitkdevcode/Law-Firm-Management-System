<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 65px;
            --color-primary: #1a1a2e;
            --color-secondary: #16213e;
            --color-accent: #c9a227;
            --color-accent-dark: #a88420;
            --color-white: #fff;
            --color-light: #f8f9fa;
            --color-text: #333;
            --color-text-light: #666;
            --color-border: #e0e0e0;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--color-light);
            color: var(--color-text);
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--color-primary);
            z-index: 1000;
            overflow-y: auto;
            transition: var(--transition);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 45px;
            height: 45px;
            background: var(--color-accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-size: 1.3rem;
        }

        .sidebar-title {
            color: var(--color-white);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-section {
            margin-bottom: 20px;
        }

        .nav-section-title {
            padding: 10px 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            transition: var(--transition);
            border-left: 3px solid transparent;
            text-decoration: none;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.05);
            color: var(--color-white);
            border-color: var(--color-accent);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        /* Header */
        .main-header {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--header-height);
            background: var(--color-white);
            border-bottom: 1px solid var(--color-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            z-index: 999;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-link {
            color: var(--color-text-light);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-link:hover {
            color: var(--color-accent);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--color-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-white);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--header-height);
            padding: 30px;
            min-height: calc(100vh - var(--header-height));
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Cards */
        .card {
            background: var(--color-white);
            border-radius: 15px;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--color-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .card-body {
            padding: 25px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--color-accent);
            color: var(--color-white);
        }

        .btn-primary:hover {
            background: var(--color-accent-dark);
        }

        .btn-secondary {
            background: var(--color-light);
            color: var(--color-text);
        }

        .btn-secondary:hover {
            background: var(--color-border);
        }

        .btn-danger {
            background: #dc3545;
            color: var(--color-white);
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--color-text);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--color-border);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-accent);
            box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-check input {
            width: 18px;
            height: 18px;
            accent-color: var(--color-accent);
        }

        /* Tables */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--color-border);
        }

        th {
            background: var(--color-light);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background: rgba(201, 162, 39, 0.03);
        }

        /* Badges */
        .badge {
            display: inline-flex;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        .badge-secondary {
            background: #e2e3e5;
            color: #383d41;
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--color-white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow-sm);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 5px;
        }

        .stat-label {
            color: var(--color-text-light);
            font-size: 0.9rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 14px;
            border-radius: 6px;
            border: 1px solid var(--color-border);
            color: var(--color-text);
        }

        .pagination a:hover,
        .pagination .active {
            background: var(--color-accent);
            color: var(--color-white);
            border-color: var(--color-accent);
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            background: var(--color-light);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--color-text);
        }

        /* Sidebar Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* Close button for mobile sidebar */
        .sidebar-close {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50%;
            color: var(--color-white);
            cursor: pointer;
            font-size: 1rem;
        }

        /* Actions */
        .action-btns {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        /* Quick Stats Grid */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        /* Responsive - Large screens */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Responsive - Tablets */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .main-content {
                padding: 20px;
            }

            .card-body {
                padding: 20px;
            }

            th,
            td {
                padding: 12px 10px;
                font-size: 0.9rem;
            }
        }

        /* Responsive - Mobile */
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .sidebar-close {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1001;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-header {
                left: 0;
                padding: 0 15px;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }

            .header-title {
                font-size: 1rem;
            }

            .header-right .header-link span,
            .user-menu span {
                display: none;
            }

            .header-right {
                gap: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .quick-stats {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .page-header .btn {
                width: 100%;
                justify-content: center;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            /* Table responsive */
            .table-wrapper {
                margin: 0 -15px;
                padding: 0 15px;
            }

            table {
                min-width: 600px;
            }

            th,
            td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }

            /* Card adjustments */
            .card {
                border-radius: 12px;
            }

            .card-header {
                padding: 15px;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .card-body {
                padding: 15px;
            }

            /* Button adjustments */
            .btn {
                padding: 10px 15px;
                font-size: 0.85rem;
            }

            .btn-sm {
                padding: 6px 10px;
            }

            /* Form adjustments */
            .form-control {
                padding: 10px 12px;
                font-size: 0.9rem;
            }

            /* Alert adjustments */
            .alert {
                padding: 12px 15px;
                font-size: 0.9rem;
            }
        }

        /* Responsive - Small Mobile */
        @media (max-width: 480px) {
            .main-header {
                height: 55px;
            }

            .main-content {
                margin-top: 55px;
                padding: 10px;
            }

            .header-title {
                font-size: 0.9rem;
                max-width: 150px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .quick-stats {
                grid-template-columns: 1fr;
            }

            .action-btns {
                flex-direction: column;
            }

            .action-btns .btn {
                width: 100%;
                justify-content: center;
            }

            .user-avatar {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }

            .page-title {
                font-size: 1.2rem;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <button class="sidebar-close" id="sidebarClose">
            <i class="fas fa-times"></i>
        </button>
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-balance-scale"></i>
            </div>
            <span class="sidebar-title">LegalPro Admin</span>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-section">
                <div class="nav-section-title">Content</div>
                <a href="{{ route('admin.practice-areas.index') }}"
                    class="nav-link {{ request()->routeIs('admin.practice-areas.*') ? 'active' : '' }}">
                    <i class="fas fa-gavel"></i>
                    Practice Areas
                </a>
                <a href="{{ route('admin.cases.index') }}"
                    class="nav-link {{ request()->routeIs('admin.cases.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    Cases
                </a>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-quote-right"></i>
                    Testimonials
                </a>
                <a href="{{ route('admin.team.index') }}"
                    class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    Team Members
                </a>
                <a href="{{ route('admin.faqs.index') }}"
                    class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i>
                    FAQs
                </a>
            </div>
            <div class="nav-section">
                <div class="nav-section-title">Blog</div>
                <a href="{{ route('admin.blog.posts.index') }}"
                    class="nav-link {{ request()->routeIs('admin.blog.posts.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i>
                    Blog Posts
                </a>
                <a href="{{ route('admin.blog.categories.index') }}"
                    class="nav-link {{ request()->routeIs('admin.blog.categories.*') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i>
                    Categories
                </a>
            </div>
            <div class="nav-section">
                <div class="nav-section-title">Other</div>
                <a href="{{ route('admin.contacts.index') }}"
                    class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i>
                    Contacts
                </a>
                <a href="{{ route('admin.seo.index') }}"
                    class="nav-link {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
                    <i class="fas fa-search"></i>
                    SEO Manager
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i>
                    Users
                </a>
                <a href="{{ route('admin.settings.index') }}"
                    class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </div>
        </nav>
    </aside>

    <!-- Header -->
    <header class="main-header">
        <div class="header-left">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">@yield('title', 'Dashboard')</h1>
        </div>
        <div class="header-right">
            <a href="{{ route('home') }}" class="header-link" target="_blank">
                <i class="fas fa-external-link-alt"></i>
                <span>View Site</span>
            </a>
            <div class="user-menu">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const sidebarClose = document.getElementById('sidebarClose');

        function openSidebar() {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        menuToggle.addEventListener('click', openSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);
        sidebarClose.addEventListener('click', closeSidebar);

        // Close sidebar on nav link click (mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    closeSidebar();
                }
            });
        });

        // Handle resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });
    </script>
    @stack('scripts')
</body>

</html>