# Laravel Application Deployment Guide

## Overview
This guide covers deploying a Laravel application to various hosting platforms including DigitalOcean, Heroku, and shared hosting.

## Pre-Deployment Checklist

### 1. Environment Configuration
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate new `APP_KEY`
- [ ] Configure database credentials
- [ ] Set up mail configuration
- [ ] Configure cache and session drivers

### 2. Code Preparation
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Ensure storage and bootstrap/cache directories are writable

## Deployment Options

## Option 1: DigitalOcean Droplet Deployment

### Server Setup
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install required packages
sudo apt install nginx mysql-server php8.1-fpm php8.1-mysql php8.1-xml php8.1-gd php8.1-curl php8.1-mbstring php8.1-zip unzip git -y

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Database Setup
```bash
# Secure MySQL installation
sudo mysql_secure_installation

# Create database and user
sudo mysql -u root -p
CREATE DATABASE laravel_app;
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON laravel_app.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### Application Deployment
```bash
# Clone repository
cd /var/www
sudo git clone https://github.com/yourusername/your-laravel-app.git
sudo chown -R www-data:www-data your-laravel-app
cd your-laravel-app

# Install dependencies
sudo -u www-data composer install --optimize-autoloader --no-dev

# Set permissions
sudo chmod -R 755 /var/www/your-laravel-app
sudo chmod -R 775 /var/www/your-laravel-app/storage
sudo chmod -R 775 /var/www/your-laravel-app/bootstrap/cache
```

### Nginx Configuration
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/your-laravel-app/public;

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

## Option 2: Heroku Deployment

### Prerequisites
```bash
# Install Heroku CLI
# Create Procfile in project root
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile
```

### Deployment Steps
```bash
# Login to Heroku
heroku login

# Create Heroku app
heroku create your-app-name

# Set environment variables
heroku config:set APP_NAME="Your Laravel App"
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)

# Add database
heroku addons:create heroku-postgresql:hobby-dev

# Deploy
git add .
git commit -m "Deploy to Heroku"
git push heroku main

# Run migrations
heroku run php artisan migrate --force
```

## Option 3: Shared Hosting Deployment

### File Structure Setup
```
public_html/
├── (Laravel public folder contents)
laravel_app/ (outside public_html)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
└── .env
```

### Modified index.php for Shared Hosting
```php
<?php
// public_html/index.php
require __DIR__.'/../laravel_app/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel_app/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);
```

## Environment Configuration

### Production .env Template
```env
APP_NAME="Your Laravel App"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-domain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Database Migration and Seeding

### Production Migration Commands
```bash
# Run migrations
php artisan migrate --force

# Seed database (if needed)
php artisan db:seed --force

# Clear and cache config
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## SSL Certificate Setup (Let's Encrypt)

### For DigitalOcean/VPS
```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx -y

# Obtain SSL certificate
sudo certbot --nginx -d your-domain.com

# Auto-renewal setup
sudo crontab -e
# Add: 0 12 * * * /usr/bin/certbot renew --quiet
```

## Monitoring and Maintenance

### Log Monitoring
```bash
# View Laravel logs
tail -f storage/logs/laravel.log

# View Nginx logs
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/nginx/access.log
```

### Performance Optimization
```bash
# Enable OPcache (add to php.ini)
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

## Troubleshooting Common Issues

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/your-app
sudo chmod -R 755 /var/www/your-app
sudo chmod -R 775 /var/www/your-app/storage
sudo chmod -R 775 /var/www/your-app/bootstrap/cache
```

### Storage Link Issue
```bash
php artisan storage:link
```

### Clear All Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Security Checklist

- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Hide .env file from web access
- [ ] Enable HTTPS with SSL certificate
- [ ] Set up firewall rules
- [ ] Regular security updates
- [ ] Database backup strategy
- [ ] Monitor application logs

## Backup Strategy

### Database Backup Script
```bash
#!/bin/bash
# backup.sh
DATE=$(date +%Y%m%d_%H%M%S)
mysqldump -u username -p password database_name > backup_$DATE.sql
```

### Automated Backup Cron
```bash
# Add to crontab
0 2 * * * /path/to/backup.sh
```

This deployment guide covers the essential steps for deploying Laravel applications across different hosting platforms with proper security and performance considerations.