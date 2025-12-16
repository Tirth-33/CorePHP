@echo off
echo === Laravel Notifications Test ===
echo.

echo 1. Running system check...
php test_system.php
echo.

echo 2. Setting up database...
php artisan migrate --force
echo.

echo 3. Starting queue worker (background)...
start /B php artisan queue:work
echo Queue worker started in background
echo.

echo 4. Testing notification system...
curl -X POST http://localhost/posts -H "Content-Type: application/json" -d "{\"title\":\"Test Post\",\"content\":\"Testing notifications\"}"
echo.

echo 5. Checking queue jobs...
php artisan queue:work --once
echo.

echo Test completed! Check storage/logs/laravel.log for email notifications.
pause