# Email Sending APIs - User Registration with Email Confirmation

## Overview
Complete user registration system with email confirmation using SendGrid or Mailgun APIs.

## Features
- **User Registration**: Full registration form with validation
- **Email Confirmation**: Automatic confirmation emails sent upon registration
- **Database Integration**: Stores user data with verification status
- **Multiple Email Providers**: Supports both SendGrid and Mailgun APIs
- **Demo Mode**: Works immediately with simulated email sending
- **Email Verification**: Secure token-based email confirmation process

## Files
- `index.html` - User registration form
- `register.php` - Registration backend with email sending
- `confirm.php` - Email confirmation handler
- `README.md` - Setup and usage instructions

## How to Use

### Demo Mode (Immediate Testing)
1. Open `index.html` in browser
2. Fill out registration form
3. Submit to see simulated email confirmation
4. View email preview in the interface

### Real Email Integration

#### Option 1: SendGrid Setup
1. Get API key from [SendGrid](https://sendgrid.com/)
2. Replace `YOUR_SENDGRID_API_KEY` in `register.php`
3. Configure sender email address

#### Option 2: Mailgun Setup
1. Get API key from [Mailgun](https://www.mailgun.com/)
2. Replace `YOUR_MAILGUN_API_KEY` and `YOUR_MAILGUN_DOMAIN` in `register.php`
3. Verify your domain in Mailgun dashboard

## Registration Process
1. **User Registration**: User fills out form with name, email, password
2. **Data Validation**: Server validates input and checks for duplicate emails
3. **Database Storage**: User data stored with verification token
4. **Email Sending**: Confirmation email sent via SendGrid/Mailgun
5. **Email Confirmation**: User clicks link to verify email address
6. **Account Activation**: Account marked as verified in database

## Database Schema
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email_verified BOOLEAN DEFAULT FALSE,
    verification_token VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Email Template Features
- **Professional Design**: Clean, responsive HTML email template
- **Personalization**: Includes user's name and custom messaging
- **Secure Links**: Token-based verification URLs
- **Branding**: Customizable colors and company information
- **Fallback Text**: Plain text version for email clients

## API Integration Details

### SendGrid Integration
- Uses SendGrid v3 API
- Supports HTML email templates
- Includes personalization and tracking
- Rate limits: Based on your SendGrid plan

### Mailgun Integration
- Uses Mailgun REST API
- HTML and text email support
- Domain verification required
- Rate limits: Based on your Mailgun plan

## Security Features
- **Password Hashing**: Uses PHP password_hash() function
- **Secure Tokens**: Cryptographically secure verification tokens
- **Input Validation**: Server-side validation for all inputs
- **SQL Injection Protection**: Prepared statements used throughout
- **Email Verification**: Prevents fake email registrations

## Error Handling
- **Duplicate Email**: Prevents multiple registrations with same email
- **Invalid Email**: Validates email format on client and server
- **Password Validation**: Ensures password strength requirements
- **Network Errors**: Graceful handling of API failures
- **Database Errors**: Proper error messages for database issues

## Customization Options
- **Email Templates**: Modify HTML template in `generateEmailHTML()` function
- **Validation Rules**: Adjust password requirements and other validations
- **Branding**: Update colors, logos, and messaging
- **Database Fields**: Add additional user fields as needed
- **Email Providers**: Easy to add other email service providers

## Testing
- **Demo Mode**: Test registration flow without real emails
- **Email Preview**: See how confirmation emails will look
- **Database Verification**: Check user records and verification status
- **Token Validation**: Test email confirmation links

## Production Deployment
1. **Configure Email API**: Add real SendGrid/Mailgun credentials
2. **Update URLs**: Change confirmation URLs to production domain
3. **SSL Certificate**: Ensure HTTPS for secure token transmission
4. **Database Security**: Use strong database credentials
5. **Rate Limiting**: Implement registration rate limiting if needed

## No Setup Required for Demo
- Works immediately with mock email sending
- Creates database and tables automatically
- Includes sample email preview
- Perfect for development and testing