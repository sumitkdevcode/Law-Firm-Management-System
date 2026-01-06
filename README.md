# LegalPro Law Office - Lawyer Portfolio Website

A dynamic, professional law firm portfolio website built with Laravel 10. Features a premium frontend design with golden accent colors, responsive admin panel for content management, SEO optimization, and automated email responses.

## Features

### Frontend
- 🏠 **Professional Homepage** - Hero section, practice areas, testimonials, case studies
- 👨‍⚖️ **About Page** - Firm story, timeline, team overview
- ⚖️ **Services** - Practice areas with detailed pages
- 📁 **Portfolio** - Case studies showcase
- 👥 **Team** - Attorney profiles with social links
- 📝 **Blog** - Legal news and insights with categories
- 📧 **Contact** - Contact form with auto-reply emails
- ❓ **FAQ** - Frequently asked questions

### Admin Panel
- 📊 **Dashboard** - Statistics overview
- ✏️ **Content Management** - Practice areas, cases, testimonials, team, FAQs
- 📰 **Blog Management** - Posts and categories
- 📬 **Contact Management** - View and manage inquiries
- 🔍 **SEO Manager** - Per-page meta tags optimization
- 👤 **User Management** - Admin/Editor roles
- ⚙️ **Site Settings** - Configurable site options

### Technical Features
- 📱 Fully responsive design
- 🎨 Premium UI with golden accent theme
- 📧 Automated email responses
- 🔐 Secure authentication
- 🔍 SEO optimized

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js & NPM (for assets, optional)

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/lawyer-portfolio.git
cd lawyer-portfolio
```

### 2. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure .env
Edit `.env` file with your settings:
```env
APP_NAME="Your Law Firm Name"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_HOST=smtp.gmail.com
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
```

### 5. Database Setup
```bash
php artisan migrate --force
php artisan db:seed --force
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Optimize for Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

## Default Admin Login

After seeding, you can login with:
- **Email:** admin@lawyer.com
- **Password:** password

⚠️ **Important:** Change the default password immediately after first login!

## Deployment

### Shared Hosting (cPanel)

1. Upload files to `public_html` or subdomain folder
2. Move `public` folder contents to root
3. Update `index.php` paths if needed
4. Create database via cPanel
5. Import database or run migrations via SSH
6. Configure `.env` file
7. Set permissions:
   ```
   storage/ - 775
   bootstrap/cache/ - 775
   ```

### VPS/Cloud Server

1. Install LAMP/LEMP stack
2. Clone repository to `/var/www/your-site`
3. Configure Nginx/Apache virtual host
4. Set permissions:
   ```bash
   sudo chown -R www-data:www-data /var/www/your-site
   sudo chmod -R 755 /var/www/your-site
   sudo chmod -R 775 /var/www/your-site/storage
   sudo chmod -R 775 /var/www/your-site/bootstrap/cache
   ```
5. Run deployment commands
6. Set up SSL with Let's Encrypt

### Nginx Configuration Example
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/your-site/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Email Configuration

For the contact form auto-reply to work, configure SMTP in `.env`:

### Gmail Setup
1. Enable 2-Factor Authentication in Google Account
2. Generate App Password: Google Account → Security → App Passwords
3. Use App Password in `MAIL_PASSWORD`

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

## Maintenance

### Clear Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Update Application
```bash
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize
```

## Directory Structure

```
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Mail/                 # Email classes
│   └── Models/               # Eloquent models
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   └── views/
│       ├── admin/            # Admin views
│       ├── emails/           # Email templates
│       ├── frontend/         # Frontend views
│       └── layouts/          # Layout files
├── routes/
│   └── web.php               # Route definitions
└── public/                   # Public assets
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, please contact: your-email@domain.com
