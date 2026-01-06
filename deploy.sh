#!/bin/bash

# ============================================
# LegalPro Law Office - Deployment Script
# ============================================

set -e

echo "🚀 Starting deployment..."

# Pull latest changes
echo "📥 Pulling latest code..."
git pull origin main

# Install dependencies (production only)
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Clear all caches
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Run migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Ensure storage link exists
echo "🔗 Creating storage link..."
php artisan storage:link 2>/dev/null || true

# Set permissions
echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo ""
echo "✅ Deployment completed successfully!"
echo ""
echo "📝 Post-deployment checklist:"
echo "   1. Verify .env settings (APP_DEBUG=false)"
echo "   2. Test website functionality"
echo "   3. Check error logs if issues occur"
echo "   4. Clear browser cache"
echo ""
