# Social Authentication - Google & Facebook Login

## Overview
Complete social authentication system allowing users to log in using Google or Facebook accounts with fallback to traditional email/password login.

## Features
- **Google OAuth**: Sign in with Google accounts
- **Facebook Login**: Sign in with Facebook accounts  
- **Traditional Login**: Email/password fallback option
- **User Profiles**: Display user information after login
- **Session Management**: Persistent login sessions
- **Database Integration**: Store user data from social providers
- **Demo Mode**: Works immediately without API keys

## Files
- `index.html` - Social login interface with Google/Facebook buttons
- `auth.php` - Backend authentication handler with database integration
- `README.md` - Setup instructions and OAuth configuration guide

## How to Use

### Demo Mode (Immediate Testing)
1. Open `index.html` in browser
2. Click "Continue with Google" or "Continue with Facebook"
3. See simulated social login with mock user data
4. Try traditional login with any email/password

### Real OAuth Integration

#### Google OAuth Setup
1. **Create Google Project**
   - Go to [Google Cloud Console](https://console.cloud.google.com/)
   - Create new project or select existing one

2. **Enable Google+ API**
   - Navigate to "APIs & Services" → "Library"
   - Search and enable "Google+ API"

3. **Create OAuth Credentials**
   - Go to "APIs & Services" → "Credentials"
   - Click "Create Credentials" → "OAuth 2.0 Client IDs"
   - Set application type to "Web application"
   - Add authorized origins: `http://localhost`

4. **Configure Application**
   - Replace `YOUR_GOOGLE_CLIENT_ID` in `index.html`
   - Replace `YOUR_GOOGLE_CLIENT_ID` in `auth.php`

#### Facebook Login Setup
1. **Create Facebook App**
   - Go to [Facebook Developers](https://developers.facebook.com/)
   - Click "Create App" → "Consumer"

2. **Add Facebook Login Product**
   - In app dashboard, click "Add Product"
   - Select "Facebook Login" → "Set Up"

3. **Configure OAuth Settings**
   - Go to Facebook Login → Settings
   - Add Valid OAuth Redirect URIs: `http://localhost/your-path/`
   - Enable "Login with the JavaScript SDK"

4. **Configure Application**
   - Replace `YOUR_FACEBOOK_APP_ID` in `index.html`
   - Replace `YOUR_FACEBOOK_APP_ID` and `YOUR_FACEBOOK_APP_SECRET` in `auth.php`

## Authentication Flow

### Google OAuth Flow
1. **User clicks Google button** → Google OAuth popup opens
2. **User authorizes app** → Google returns ID token
3. **Token verification** → Server verifies token with Google
4. **User creation/update** → Store user data in database
5. **Session creation** → Create user session
6. **Profile display** → Show user profile information

### Facebook Login Flow
1. **User clicks Facebook button** → Facebook login dialog opens
2. **User authorizes app** → Facebook returns access token
3. **User data fetch** → Get user info from Facebook Graph API
4. **Token verification** → Verify token belongs to our app
5. **User creation/update** → Store user data in database
6. **Session creation** → Create user session
7. **Profile display** → Show user profile information

## Database Schema
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    provider VARCHAR(50) NOT NULL,
    provider_id VARCHAR(255),
    avatar_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## User Data Collected
- **Name**: Full name from social provider
- **Email**: Email address (required for account linking)
- **Avatar**: Profile picture URL
- **Provider**: 'google', 'facebook', or 'traditional'
- **Provider ID**: Unique ID from social provider
- **Login Timestamps**: Account creation and last login times

## Security Features
- **Token Verification**: All social tokens verified server-side
- **Session Management**: Secure PHP sessions for user state
- **Input Validation**: All user inputs validated and sanitized
- **SQL Injection Protection**: Prepared statements used throughout
- **CSRF Protection**: Social OAuth flows include state parameters

## API Endpoints (auth.php)
- `POST ?action=google_login` - Handle Google OAuth token
- `POST ?action=facebook_login` - Handle Facebook access token
- `POST ?action=logout` - Destroy user session
- `GET ?action=get_user` - Get current user session

## Error Handling
- **Invalid Tokens**: Proper validation of OAuth tokens
- **Network Errors**: Graceful handling of API failures
- **Database Errors**: User-friendly error messages
- **Missing Permissions**: Handle denied social permissions
- **Duplicate Accounts**: Link accounts by email address

## Customization Options
- **Styling**: Modify CSS for custom branding
- **Additional Providers**: Add Twitter, LinkedIn, GitHub, etc.
- **User Fields**: Collect additional profile information
- **Permissions**: Request additional social permissions
- **Redirect URLs**: Customize post-login redirects

## Production Considerations
- **HTTPS Required**: Social providers require HTTPS in production
- **Domain Verification**: Configure authorized domains in OAuth settings
- **Rate Limiting**: Implement login attempt rate limiting
- **Privacy Policy**: Required for social app approval
- **Terms of Service**: Required for production social apps

## Testing
- **Demo Mode**: Test without real OAuth credentials
- **Mock Data**: Realistic user profiles for testing
- **Session Persistence**: Test login state across page reloads
- **Multiple Providers**: Test account linking by email
- **Logout Flow**: Verify complete session cleanup

## Dependencies
- **Google SDK**: Google Sign-In JavaScript library
- **Facebook SDK**: Facebook JavaScript SDK
- **PHP Sessions**: For server-side session management
- **MySQL**: For user data storage

## No Setup Required for Demo
- Works immediately with simulated OAuth
- Creates database tables automatically
- Includes realistic mock user data
- Perfect for development and testing