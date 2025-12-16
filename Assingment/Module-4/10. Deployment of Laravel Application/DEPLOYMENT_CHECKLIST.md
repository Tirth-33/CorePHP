# Laravel Deployment Checklist

## Pre-Deployment
- [ ] Code is tested and working locally
- [ ] All dependencies are in composer.json
- [ ] Database migrations are ready
- [ ] Environment variables are documented
- [ ] Static assets are compiled (`npm run build`)

## Environment Setup
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate new `APP_KEY` (`php artisan key:generate`)
- [ ] Configure database credentials
- [ ] Set proper `APP_URL`
- [ ] Configure mail settings
- [ ] Set cache/session drivers appropriately

## Server Configuration
- [ ] PHP 8.1+ installed
- [ ] Required PHP extensions enabled
- [ ] Composer installed
- [ ] Web server configured (Nginx/Apache)
- [ ] SSL certificate installed
- [ ] Firewall configured

## Database Setup
- [ ] Database created
- [ ] Database user created with proper permissions
- [ ] Connection tested
- [ ] Migrations run (`php artisan migrate --force`)
- [ ] Seeders run if needed (`php artisan db:seed --force`)

## File Permissions
- [ ] Application directory owned by web server user
- [ ] Storage directory writable (775)
- [ ] Bootstrap/cache directory writable (775)
- [ ] Storage link created (`php artisan storage:link`)

## Performance Optimization
- [ ] Config cached (`php artisan config:cache`)
- [ ] Routes cached (`php artisan route:cache`)
- [ ] Views cached (`php artisan view:cache`)
- [ ] Autoloader optimized (`composer install --optimize-autoloader --no-dev`)
- [ ] OPcache enabled

## Security
- [ ] .env file protected from web access
- [ ] Debug mode disabled
- [ ] Security headers configured
- [ ] HTTPS enforced
- [ ] Regular backups scheduled

## Testing
- [ ] Application loads correctly
- [ ] Database connections work
- [ ] File uploads work (if applicable)
- [ ] Email sending works (if applicable)
- [ ] All major features tested

## Monitoring
- [ ] Error logging configured
- [ ] Log rotation set up
- [ ] Monitoring tools configured
- [ ] Backup verification scheduled