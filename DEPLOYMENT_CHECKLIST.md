# LegalPro Law Office - Deployment Checklist

## Pre-Deployment

### Server Requirements
- [ ] PHP 8.1+ with extensions: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML
- [ ] MySQL 5.7+ or MariaDB 10.3+
- [ ] Composer installed
- [ ] SSL certificate ready (Let's Encrypt or paid)

### Code Preparation
- [ ] All changes committed to Git
- [ ] Tested locally with production settings
- [ ] No `dd()`, `dump()`, or debug statements in code
- [ ] Error handling implemented

---

## Deployment Steps

### 1. Upload Code
- [ ] Clone/upload code to server
- [ ] Exclude `.env`, `node_modules/`, `vendor/` from upload

### 2. Environment Configuration
- [ ] Copy `.env.example` to `.env`
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_URL` to your domain (with https://)
- [ ] Configure database credentials
- [ ] Configure mail settings

### 3. Generate App Key
```bash
php artisan key:generate
```
- [ ] App key generated

### 4. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
```
- [ ] Dependencies installed

### 5. Database Setup
```bash
php artisan migrate --force
php artisan db:seed --force  # Only for fresh install
```
- [ ] Migrations run
- [ ] Seeder run (if fresh install)

### 6. Storage Link
```bash
php artisan storage:link
```
- [ ] Storage linked

### 7. Directory Permissions
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```
- [ ] Permissions set

### 8. Optimize for Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```
- [ ] Caches generated

---

## Post-Deployment

### Security
- [ ] Change default admin password (admin@lawyer.com / password)
- [ ] Remove or disable any test accounts
- [ ] SSL certificate active (https working)
- [ ] `.env` file not publicly accessible

### Testing
- [ ] Homepage loads correctly
- [ ] All pages accessible
- [ ] Contact form submits successfully
- [ ] Auto-reply emails sending
- [ ] Admin login works
- [ ] Admin CRUD operations work
- [ ] Images upload correctly
- [ ] Responsive design on mobile

### SEO
- [ ] SEO pages configured in admin
- [ ] robots.txt accessible
- [ ] Sitemap generated (if applicable)
- [ ] Google Search Console configured

### Monitoring
- [ ] Error logging configured
- [ ] Check `storage/logs/laravel.log` for errors
- [ ] Set up uptime monitoring

---

## Maintenance Commands

### Clear All Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Rebuild Caches
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Update Deployment
```bash
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan optimize
```

---

## Troubleshooting

### 500 Error
1. Check `storage/logs/laravel.log`
2. Verify `.env` file exists and has correct values
3. Run `php artisan config:clear`
4. Check file permissions

### Page Not Found (404)
1. Run `php artisan route:clear`
2. Verify `.htaccess` or Nginx config
3. Check `mod_rewrite` enabled (Apache)

### Images Not Loading
1. Run `php artisan storage:link`
2. Check storage permissions
3. Verify upload paths

### Emails Not Sending
1. Verify SMTP settings in `.env`
2. Check mail log for errors
3. Test with different mail provider

---

## Important URLs

| URL | Description |
|-----|-------------|
| `/` | Homepage |
| `/admin/login` | Admin login |
| `/admin` | Admin dashboard |
| `/contact` | Contact form |

---

## Emergency Rollback

If deployment fails:
```bash
# Revert to previous commit
git reset --hard HEAD~1

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Rollback last migration (if needed)
php artisan migrate:rollback
```
