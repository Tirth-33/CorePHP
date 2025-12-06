<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$city = $input['city'] ?? '';

if (empty($city)) {
    http_response_code(400);
    echo json_encode(['error' => 'City name is required']);
    exit();
}

// OpenWeatherMap API configuration
$api_key = 'your_api_key_here'; // Replace with actual API key
$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $api_key . "&units=metric";

// For demo purposes, use mock data if no API key
if ($api_key === 'your_api_key_here') {
    // Mock weather data for demonstration
    $weather_data = [
        'London' => ['temp' => 15, 'description' => 'Cloudy', 'humidity' => 65, 'wind' => 12, 'icon' => '04d', 'timezone' => 0, 'country' => 'GB'],
        'New York' => ['temp' => 22, 'description' => 'Sunny', 'humidity' => 45, 'wind' => 8, 'icon' => '01d', 'timezone' => -5, 'country' => 'US'],
        'Tokyo' => ['temp' => 18, 'description' => 'Rainy', 'humidity' => 80, 'wind' => 15, 'icon' => '10d', 'timezone' => 9, 'country' => 'JP'],
        'Paris' => ['temp' => 12, 'description' => 'Overcast', 'humidity' => 70, 'wind' => 10, 'icon' => '04d', 'timezone' => 1, 'country' => 'FR'],
        'Mumbai' => ['temp' => 28, 'description' => 'Hot', 'humidity' => 85, 'wind' => 5, 'icon' => '01d', 'timezone' => 5.5, 'country' => 'IN'],
        'Delhi' => ['temp' => 32, 'description' => 'Clear', 'humidity' => 60, 'wind' => 7, 'icon' => '01d', 'timezone' => 5.5, 'country' => 'IN'],
        'Sydney' => ['temp' => 20, 'description' => 'Partly Cloudy', 'humidity' => 55, 'wind' => 14, 'icon' => '02d', 'timezone' => 11, 'country' => 'AU'],
        'Dubai' => ['temp' => 35, 'description' => 'Sunny', 'humidity' => 40, 'wind' => 6, 'icon' => '01d', 'timezone' => 4, 'country' => 'AE'],
        'Singapore' => ['temp' => 30, 'description' => 'Thunderstorm', 'humidity' => 90, 'wind' => 8, 'icon' => '11d', 'timezone' => 8, 'country' => 'SG'],
        'Berlin' => ['temp' => 8, 'description' => 'Snow', 'humidity' => 75, 'wind' => 12, 'icon' => '13d', 'timezone' => 1, 'country' => 'DE'],
        'Moscow' => ['temp' => -5, 'description' => 'Snow', 'humidity' => 80, 'wind' => 18, 'icon' => '13d', 'timezone' => 3, 'country' => 'RU'],
        'Cairo' => ['temp' => 25, 'description' => 'Clear', 'humidity' => 35, 'wind' => 9, 'icon' => '01d', 'timezone' => 2, 'country' => 'EG'],
        'Bangkok' => ['temp' => 33, 'description' => 'Hot', 'humidity' => 85, 'wind' => 4, 'icon' => '01d', 'timezone' => 7, 'country' => 'TH'],
        'Rome' => ['temp' => 16, 'description' => 'Cloudy', 'humidity' => 68, 'wind' => 11, 'icon' => '04d', 'timezone' => 1, 'country' => 'IT'],
        'Barcelona' => ['temp' => 19, 'description' => 'Sunny', 'humidity' => 50, 'wind' => 13, 'icon' => '01d', 'timezone' => 1, 'country' => 'ES']
    ];
    
    $city_key = ucfirst(strtolower($city));
    if (isset($weather_data[$city_key])) {
        $data = $weather_data[$city_key];
        echo json_encode([
            'name' => $city_key,
            'main' => ['temp' => $data['temp'], 'humidity' => $data['humidity']],
            'weather' => [['main' => $data['description'], 'icon' => $data['icon']]],
            'wind' => ['speed' => $data['wind']],
            'sys' => ['country' => $data['country']],
            'timezone' => $data['timezone'] * 3600
        ]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'City not found']);
    }
    exit();
}

// Real API call
$response = file_get_contents($api_url);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch weather data']);
    exit();
}

$weather_data = json_decode($response, true);

if (isset($weather_data['cod']) && $weather_data['cod'] !== 200) {
    http_response_code(404);
    echo json_encode(['error' => 'City not found']);
    exit();
}

echo $response;
?>