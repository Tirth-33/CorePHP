# Weather Dashboard - OpenWeatherMap API

## Setup Instructions

### Option 1: Use Mock Data (Default)
- No setup required
- Works with cities: London, New York, Tokyo, Paris, Mumbai
- Open `index.html` and test immediately

### Option 2: Use Real OpenWeatherMap API
1. Get free API key from [OpenWeatherMap](https://openweathermap.org/api)
2. Replace `your_api_key_here` in `weather.php` with your actual API key
3. Test with any city worldwide

## Features
- Real-time weather data retrieval
- User-specified location input
- Current temperature, humidity, wind speed
- Weather icons and descriptions
- Responsive design
- Error handling for invalid cities

## API Endpoints
- `POST weather.php` - Get weather data for specified city

## Usage
1. Enter city name in search box
2. Click "Get Weather" or press Enter
3. View current weather information

## Technologies
- PHP backend with OpenWeatherMap API integration
- HTML/CSS/JavaScript frontend
- JSON data exchange
- RESTful API design