# Twitter API Hashtag Search Application

## Overview
Application that integrates Twitter functionality to fetch and display tweets based on specific hashtags.

## Features
- **Hashtag Search**: Search for tweets using any hashtag
- **Tweet Display**: Shows tweet content, user info, and engagement stats
- **Real-time Data**: Fetches live tweets from Twitter API (with authentication)
- **Mock Data**: Demo version with sample tweets for immediate testing
- **Responsive Design**: Twitter-like interface that works on all devices

## Files
- `index.html` - Main application with Twitter-like interface
- `twitter_api.php` - Backend API integration (requires Twitter API credentials)
- `README.md` - Setup and usage instructions

## How to Use

### Demo Version (Immediate Use)
1. Open `index.html` in browser
2. Try these sample hashtags:
   - **Tech**: javascript, react, nodejs, python, webdev
   - **General**: coding, programming, technology

### Real Twitter API (Requires Setup)
1. Get Twitter API credentials from [Twitter Developer Portal](https://developer.twitter.com/)
2. Replace `YOUR_TWITTER_BEARER_TOKEN` in `twitter_api.php`
3. Use any hashtag to fetch real tweets

## Sample Hashtags to Try
- **Programming**: #javascript, #react, #nodejs, #python, #webdev
- **Technology**: #coding, #programming, #tech, #innovation
- **Popular**: #motivation, #inspiration, #startup, #entrepreneur

## Tweet Information Displayed
- **User Details**: Name, username, avatar
- **Tweet Content**: Full text with highlighted hashtags
- **Engagement Stats**: Likes, retweets, replies count
- **Timestamp**: When the tweet was posted

## Twitter API Setup (Optional)
1. **Create Twitter Developer Account**
   - Visit: https://developer.twitter.com/
   - Apply for developer access

2. **Create App & Get Credentials**
   - Create new app in developer portal
   - Get Bearer Token from app settings

3. **Configure Application**
   - Replace `YOUR_TWITTER_BEARER_TOKEN` in `twitter_api.php`
   - Enable required API endpoints

## API Limitations
- **Rate Limits**: Twitter API has request limits
- **Authentication Required**: Real API needs valid credentials
- **Recent Tweets Only**: API returns recent tweets (last 7 days)
- **Public Tweets**: Only public tweets are accessible

## Technologies Used
- HTML5/CSS3/JavaScript
- Twitter API v2
- PHP backend for API integration
- Fetch API for HTTP requests
- Twitter-like UI design

## Demo Data Includes
- Sample tweets for popular tech hashtags
- Realistic user profiles and engagement stats
- Proper tweet formatting with hashtag highlighting
- Time-based sorting and display

## Error Handling
- Invalid hashtag validation
- Network error handling
- API rate limit messages
- User-friendly error display

## No Setup Required for Demo
- Works immediately with sample data
- No API keys needed for testing
- Demonstrates full functionality
- Perfect for learning and development