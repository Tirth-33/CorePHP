#!/bin/bash

# Laravel Deployment Script
# Usage: ./deploy.sh

set -e

echo "Starting Laravel deployment..."

# Variables
APP_DIR="/var/www/laravel-app"
BACKUP_DIR="/var/backups/laravel"
DATE=$(date +%Y%m%d_%H%M%S)

# Create backup directory if it doesn't exist
sudo mkdir -p $BACKUP_DIR

# Backup current application
if [ -d "$APP_DIR" ]; then
    echo "Creating backup..."
    sudo tar -czf $BACKUP_DIR/backup_$DATE.tar.gz -C /var/www laravel-app
fi

# Pull latest changes
echo "Pulling latest changes..."
cd $APP_DIR
sudo -u www-data git pull origin main

# Install/Update dependencies
echo "Installing dependencies..."
sudo -u www-data composer install --optimize-autoloader --no-dev

# Clear and cache configurations
echo "Clearing caches..."
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan cache:clear
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan view:clear

echo "Caching configurations..."
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache

# Run database migrations
echo "Running migrations..."
sudo -u www-data php artisan migrate --force

# Set proper permissions
echo "Setting permissions..."
sudo chown -R www-data:www-data $APP_DIR
sudo chmod -R 755 $APP_DIR
sudo chmod -R 775 $APP_DIR/storage
sudo chmod -R 775 $APP_DIR/bootstrap/cache

# Restart services
echo "Restarting services..."
sudo systemctl reload nginx
sudo systemctl restart php8.1-fpm

echo "Deployment completed successfully!"
echo "Backup created: $BACKUP_DIR/backup_$DATE.tar.gz"