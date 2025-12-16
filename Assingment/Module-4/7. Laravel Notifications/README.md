# Laravel Notifications System

## Overview
This Laravel application implements a notification system that sends email notifications when new blog posts are published, using Laravel's queue system for background processing.

## Features
- Email notifications for new blog posts
- Queue-based notification processing
- Database queue driver
- Notification to all users when a post is published

## Setup Instructions

### 1. Database Setup
```bash
# Create database
mysql -u root -p
CREATE DATABASE laravel_notifications;
```

### 2. Run Migrations
```bash
php artisan migrate
```

### 3. Configure Mail Settings
Update `.env` file with your mail provider settings:
```
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS=noreply@example.com
```

### 4. Start Queue Worker
```bash
php artisan queue:work
```

## Usage

### Publishing a Blog Post
Send POST request to `/posts`:
```json
{
    "title": "My New Blog Post",
    "content": "This is the content of my blog post."
}
```

### Publishing an Existing Post
Send POST request to `/posts/{id}/publish`

## Key Components

### Notification Class
- `BlogPostPublished` - Handles email notification formatting
- Implements `ShouldQueue` for background processing
- Uses `Queueable` trait for queue management

### Models
- `BlogPost` - Blog post model with title, content, author
- `User` - User model with `Notifiable` trait

### Controller
- `BlogPostController` - Handles post creation and publishing
- Triggers notifications to all users

### Queue Configuration
- Database driver for queue processing
- Jobs table for storing queued notifications
- Failed jobs table for error tracking

## Queue Commands
```bash
# Process queue jobs
php artisan queue:work

# Process specific queue
php artisan queue:work --queue=default

# Restart queue workers
php artisan queue:restart
```