# GitHub API User Search Application

## Overview
Simple application that retrieves user data from the GitHub API and displays their repositories.

## Features
- **User Search**: Search for any GitHub user by username
- **Profile Display**: Shows user avatar, name, bio, and statistics
- **Repository List**: Displays user's public repositories with details
- **Real-time Data**: Fetches live data from GitHub API
- **Responsive Design**: Works on desktop and mobile devices

## How to Use
1. Open `index.html` in your browser
2. Enter a GitHub username in the search box
3. Click "Search User" or press Enter
4. View user profile and repositories

## Sample Users to Try
- **octocat** - GitHub's mascot account
- **torvalds** - Linus Torvalds (Linux creator)
- **gaearon** - Dan Abramov (React developer)
- **addyosmani** - Addy Osmani (Google developer)
- **sindresorhus** - Sindre Sorhus (Popular open source developer)
- **tj** - TJ Holowaychuk (Express.js creator)
- **defunkt** - Chris Wanstrath (GitHub co-founder)

## Data Displayed

### User Profile
- Avatar image
- Full name and username
- Bio/description
- Public repositories count
- Followers count
- Following count
- Join date

### Repositories
- Repository name
- Description
- Star count
- Fork count
- Primary language
- Last updated date
- Up to 12 most recently updated repositories

## API Integration
- Uses GitHub REST API v3
- No authentication required (public data only)
- Rate limit: 60 requests per hour for unauthenticated requests
- Real-time data fetching

## Technologies Used
- HTML5/CSS3/JavaScript
- GitHub REST API
- Fetch API for HTTP requests
- Responsive grid layout
- Modern CSS styling

## Error Handling
- User not found validation
- Network error handling
- Loading states
- User-friendly error messages

## No Setup Required
- Works immediately without API keys
- Uses public GitHub API endpoints
- No server-side code needed