# Lawyer Portfolio Website - Setup Guide

This document provides comprehensive setup instructions for the Lawyer Portfolio website built with Laravel MVC and MySQL.

## Requirements

- PHP 8.1+
- Composer
- MySQL 5.7+ or MariaDB
- Node.js (optional, for asset compilation)

## Installation Steps

### 1. Database Configuration

Create a MySQL database and update your `.env` file with the following settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lawyer_portfolio
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 2. Run Migrations

```bash
php artisan migrate
```

### 3. Seed Initial Data

This will create an admin user, practice areas, testimonials, and site settings:

```bash
php artisan db:seed
```

**Default Admin Credentials:**
- Email: `admin@lawyer.com`
- Password: `password`

### 4. Storage Link

Create a symbolic link for file uploads:

```bash
php artisan storage:link
```

### 5. Start Development Server

```bash
php artisan serve
```

The website will be available at: http://127.0.0.1:8000

## Website Structure

### Frontend Pages

| Route | Description |
|-------|-------------|
| `/` | Homepage with hero, practice areas, testimonials, cases, blog |
| `/about` | About page with history timeline and team |
| `/services` | List of all practice areas |
| `/services/{slug}` | Individual practice area detail page |
| `/portfolio` | Case studies and success stories |
| `/portfolio/{slug}` | Individual case study detail |
| `/team` | Team members listing |
| `/team/{slug}` | Team member profile |
| `/blog` | Blog posts listing |
| `/blog/{slug}` | Individual blog post |
| `/blog/category/{slug}` | Blog posts by category |
| `/faq` | Frequently asked questions |
| `/contact` | Contact form |

### Admin Panel

Access at: `/admin/login`

| Route | Description |
|-------|-------------|
| `/admin/dashboard` | Overview with statistics |
| `/admin/practice-areas` | Manage practice areas/services |
| `/admin/cases` | Manage case studies/portfolio |
| `/admin/testimonials` | Manage client testimonials |
| `/admin/team` | Manage team members |
| `/admin/faqs` | Manage FAQ items |
| `/admin/blog/posts` | Manage blog posts |
| `/admin/blog/categories` | Manage blog categories |
| `/admin/contacts` | View contact inquiries |
| `/admin/settings` | Site configuration |

## Key Features

### Content Management
- ✅ Practice Areas with icons and detailed descriptions
- ✅ Case Studies with results and related practice areas
- ✅ Client Testimonials with ratings
- ✅ Team Members with social links
- ✅ Blog with categories and rich content
- ✅ FAQs organized by practice area
- ✅ Contact form with status tracking

### Design
- ✅ Premium law firm aesthetic with golden accents
- ✅ Responsive design for all devices
- ✅ Modern typography (Playfair Display, Inter)
- ✅ Smooth animations and transitions
- ✅ Professional footer with social links

### Admin Panel
- ✅ Secure authentication
- ✅ Dashboard with statistics
- ✅ Full CRUD for all content types
- ✅ Image uploads for cases, team, blog
- ✅ SEO fields for blog posts
- ✅ Contact inquiry management

## File Structure

```
app/
├── Http/Controllers/
│   ├── HomeController.php         # Homepage
│   ├── PageController.php         # Static pages (about, services, etc.)
│   ├── BlogController.php         # Blog functionality
│   ├── ContactController.php      # Contact form
│   └── Admin/                      # Admin controllers
│       ├── DashboardController.php
│       ├── AuthController.php
│       ├── PracticeAreaController.php
│       ├── CaseController.php
│       ├── TestimonialController.php
│       ├── BlogPostController.php
│       ├── BlogCategoryController.php
│       ├── TeamMemberController.php
│       ├── ContactController.php
│       ├── FaqController.php
│       └── SettingsController.php
├── Models/
│   ├── SiteSetting.php
│   ├── PracticeArea.php
│   ├── LegalCase.php
│   ├── Testimonial.php
│   ├── BlogCategory.php
│   ├── BlogPost.php
│   ├── Contact.php
│   ├── TeamMember.php
│   └── Faq.php
resources/views/
├── layouts/
│   ├── frontend.blade.php         # Main frontend layout
│   └── admin.blade.php            # Admin panel layout
├── frontend/
│   ├── home.blade.php            # Homepage
│   ├── about.blade.php           # About page
│   ├── services.blade.php        # Services listing
│   ├── service-detail.blade.php  # Service detail
│   ├── portfolio.blade.php       # Cases listing
│   ├── case-detail.blade.php     # Case detail
│   ├── team.blade.php            # Team listing
│   ├── team-member.blade.php     # Team member detail
│   ├── contact.blade.php         # Contact form
│   ├── faq.blade.php             # FAQ page
│   └── blog/
│       ├── index.blade.php       # Blog listing
│       ├── show.blade.php        # Single post
│       └── category.blade.php    # Category posts
└── admin/
    ├── auth/login.blade.php
    ├── dashboard.blade.php
    ├── practice-areas/
    ├── cases/
    ├── testimonials/
    ├── team/
    ├── faqs/
    ├── contacts/
    ├── settings/
    └── blog/
        ├── posts/
        └── categories/
```

## Customization

### Colors
Edit CSS variables in `resources/views/layouts/frontend.blade.php`:

```css
:root {
    --color-primary: #1a1a2e;       /* Dark navy */
    --color-secondary: #16213e;     /* Dark blue */
    --color-accent: #c9a227;        /* Gold */
    --color-accent-dark: #a88420;   /* Darker gold */
}
```

### Site Settings
Update via Admin Panel → Settings, or directly in the `site_settings` database table.

## Troubleshooting

### Images Not Displaying
```bash
php artisan storage:link
```

### Login Not Working
```bash
php artisan cache:clear
php artisan config:clear
```

### Views Not Updating
```bash
php artisan view:clear
```

## Production Deployment

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `php artisan view:cache`
5. Set proper file permissions for `storage/` and `bootstrap/cache/`
