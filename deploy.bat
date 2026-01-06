@echo off
REM ============================================
REM LegalPro Law Office - Deployment Script
REM ============================================

echo.
echo ========================================
echo   LegalPro Deployment Script
echo ========================================
echo.

echo [1/6] Clearing caches...
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

echo.
echo [2/6] Installing dependencies...
call composer install --no-dev --optimize-autoloader

echo.
echo [3/6] Running database migrations...
php artisan migrate --force

echo.
echo [4/6] Creating storage link...
php artisan storage:link

echo.
echo [5/6] Optimizing for production...
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo.
echo [6/6] Deployment complete!
echo.
echo ========================================
echo   POST-DEPLOYMENT CHECKLIST
echo ========================================
echo   1. Verify .env settings
echo   2. Set APP_DEBUG=false
echo   3. Set APP_ENV=production
echo   4. Test website functionality
echo   5. Check error logs if issues
echo ========================================
echo.
pause
