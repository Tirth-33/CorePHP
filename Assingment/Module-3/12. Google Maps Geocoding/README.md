# Google Maps Geocoding API Application

## Overview
Location-based application that converts addresses to coordinates and displays them on Google Maps.

## Files
- `index.html` - Full version with Google Maps integration (requires API key)
- `demo.html` - Demo version with sample locations (works immediately)
- `geocode.php` - Backend geocoding service
- `README.md` - Setup instructions

## Setup Options

### Option 1: Demo Version (Immediate Use)
1. Open `demo.html` in browser
2. Test with sample locations:
   - **Famous Places:** Times Square, Eiffel Tower, Big Ben, Taj Mahal
   - **Cities:** Mumbai India, Tokyo Japan, Sydney Australia, Dubai UAE

### Option 2: Full Version (Google Maps API)
1. Get Google Maps API key from [Google Cloud Console](https://console.cloud.google.com/)
2. Enable Geocoding API and Maps JavaScript API
3. Replace `YOUR_API_KEY` in `index.html` with your actual API key
4. Open `index.html` in browser

## Features
- **Address Input:** Enter any address or location name
- **Geocoding:** Convert addresses to latitude/longitude coordinates
- **Map Display:** Show location on interactive Google Maps
- **Marker & Info:** Clickable markers with location details
- **Error Handling:** Proper validation and error messages
- **Responsive Design:** Works on desktop and mobile devices

## Sample Addresses to Try
- Times Square, New York
- Eiffel Tower, Paris
- Big Ben, London
- Taj Mahal, Agra, India
- Statue of Liberty, New York
- Golden Gate Bridge, San Francisco
- Mumbai, India
- Tokyo, Japan
- Sydney, Australia
- Dubai, UAE

## API Integration
- Uses Google Maps Geocoding API for address-to-coordinates conversion
- Displays results on interactive Google Maps
- Includes fallback mock data for demonstration purposes

## Technologies Used
- HTML5/CSS3/JavaScript
- Google Maps JavaScript API
- Google Maps Geocoding API
- PHP backend for API integration
- Responsive web design