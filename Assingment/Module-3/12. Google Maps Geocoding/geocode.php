<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$address = $input['address'] ?? '';

if (empty($address)) {
    http_response_code(400);
    echo json_encode(['error' => 'Address is required']);
    exit();
}

// Google Maps Geocoding API configuration
$api_key = 'YOUR_GOOGLE_MAPS_API_KEY'; // Replace with actual API key
$api_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=' . $api_key;

// For demo purposes, use mock data if no API key
if ($api_key === 'YOUR_GOOGLE_MAPS_API_KEY') {
    // Mock geocoding data for demonstration
    $locations = [
        'times square new york' => ['lat' => 40.7580, 'lng' => -73.9855, 'address' => 'Times Square, New York, NY, USA'],
        'eiffel tower paris' => ['lat' => 48.8584, 'lng' => 2.2945, 'address' => 'Eiffel Tower, Paris, France'],
        'big ben london' => ['lat' => 51.4994, 'lng' => -0.1245, 'address' => 'Big Ben, London, UK'],
        'taj mahal agra' => ['lat' => 27.1751, 'lng' => 78.0421, 'address' => 'Taj Mahal, Agra, Uttar Pradesh, India'],
        'mumbai india' => ['lat' => 19.0760, 'lng' => 72.8777, 'address' => 'Mumbai, Maharashtra, India'],
        'tokyo japan' => ['lat' => 35.6762, 'lng' => 139.6503, 'address' => 'Tokyo, Japan'],
        'sydney australia' => ['lat' => -33.8688, 'lng' => 151.2093, 'address' => 'Sydney NSW, Australia'],
        'dubai uae' => ['lat' => 25.2048, 'lng' => 55.2708, 'address' => 'Dubai, United Arab Emirates'],
        'statue of liberty' => ['lat' => 40.6892, 'lng' => -74.0445, 'address' => 'Statue of Liberty, New York, NY, USA'],
        'golden gate bridge' => ['lat' => 37.8199, 'lng' => -122.4783, 'address' => 'Golden Gate Bridge, San Francisco, CA, USA']
    ];
    
    $search_key = strtolower(trim($address));
    
    // Find matching location
    foreach ($locations as $key => $location) {
        if (strpos($search_key, $key) !== false || strpos($key, $search_key) !== false) {
            echo json_encode([
                'status' => 'OK',
                'results' => [[
                    'formatted_address' => $location['address'],
                    'geometry' => [
                        'location' => [
                            'lat' => $location['lat'],
                            'lng' => $location['lng']
                        ]
                    ]
                ]]
            ]);
            exit();
        }
    }
    
    // If no match found
    http_response_code(404);
    echo json_encode(['error' => 'Location not found. Try: Times Square, Eiffel Tower, Big Ben, Taj Mahal, Mumbai, Tokyo, Sydney, Dubai']);
    exit();
}

// Real API call
$response = file_get_contents($api_url);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch location data']);
    exit();
}

$data = json_decode($response, true);

if ($data['status'] !== 'OK' || empty($data['results'])) {
    http_response_code(404);
    echo json_encode(['error' => 'Location not found']);
    exit();
}

echo $response;
?>