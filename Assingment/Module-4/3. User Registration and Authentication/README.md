# User Registration and Authentication System

A Laravel-based user registration and authentication system with email verification.

## Features

- User registration with username, email, and password
- Email verification system
- User login/logout functionality
- Protected dashboard displaying user information
- Clean, responsive UI

## Setup Instructions

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Environment Configuration**
   - Copy `.env.example` to `.env` (already done)
   - Update database credentials in `.env`
   - Configure mail settings for email verification

3. **Database Setup**
   ```bash
   php artisan migrate
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Usage

1. Visit the application homepage
2. Register a new account with username, email, and password
3. Check your email for verification link
4. Verify your email address
5. Access the dashboard to view your user information

## File Structure

- `app/Models/User.php` - User model with email verification
- `app/Http/Controllers/AuthController.php` - Authentication logic
- `app/Http/Controllers/DashboardController.php` - Dashboard controller
- `app/Http/Controllers/EmailVerificationController.php` - Email verification
- `routes/web.php` - Application routes
- `resources/views/` - Blade templates
- `database/migrations/` - Database schema

## Requirements Met

✅ User registration with username, email, and password  
✅ Email verification implementation  
✅ Dashboard displaying user information after login  
✅ Laravel's built-in authentication system