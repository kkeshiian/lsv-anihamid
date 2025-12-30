@echo off
echo ========================================
echo PT. ANIHAMID GROUP WISATA
echo Website Setup Script
echo ========================================
echo.

echo [1/6] Checking Laravel installation...
php artisan --version
if errorlevel 1 (
    echo ERROR: Laravel not found!
    pause
    exit /b 1
)
echo.

echo [2/6] Installing Composer dependencies...
call composer install --no-interaction --prefer-dist --optimize-autoloader
echo.

echo [3/6] Installing NPM dependencies...
call npm install
echo.

echo [4/6] Setting up environment...
if not exist .env (
    echo Copying .env.example to .env...
    copy .env.example .env
    php artisan key:generate
)
echo.

echo [5/6] Creating storage link...
php artisan storage:link
echo.

echo [6/6] Building assets...
call npm run build
echo.

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo NEXT STEPS:
echo 1. Create database 'lsv_umroh' in MySQL
echo 2. Run: php artisan migrate:fresh --seed
echo 3. Run: php artisan serve
echo 4. Open: http://localhost:8000
echo.
echo LOGIN ADMIN:
echo Email: admin@anihamid.com
echo Password: password
echo.
pause
