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
$hashtag = $input['hashtag'] ?? '';

if (empty($hashtag)) {
    http_response_code(400);
    echo json_encode(['error' => 'Hashtag is required']);
    exit();
}

// Twitter API configuration (requires authentication)
$bearer_token = 'YOUR_TWITTER_BEARER_TOKEN'; // Replace with actual bearer token
$api_url = 'https://api.twitter.com/2/tweets/search/recent?query=' . urlencode('#' . $hashtag) . '&max_results=10&tweet.fields=created_at,author_id,public_metrics&expansions=author_id&user.fields=name,username,profile_image_url';

// For demo purposes, use mock data if no bearer token
if ($bearer_token === 'YOUR_TWITTER_BEARER_TOKEN') {
    // Mock tweet data for demonstration
    $mock_tweets = [
        'javascript' => [
            [
                'user' => ['name' => 'John Developer', 'username' => 'johndev', 'avatar' => '👨💻'],
                'text' => 'Just discovered a new #JavaScript feature that makes async programming so much easier! The power of modern JS never ceases to amaze me. 🚀',
                'likes' => 245, 'retweets' => 89, 'replies' => 23, 'time' => '2h'
            ],
            [
                'user' => ['name' => 'Sarah Code', 'username' => 'sarahcodes', 'avatar' => '👩💻'],
                'text' => 'Working on a new project with vanilla #JavaScript. Sometimes going back to basics helps you appreciate the fundamentals! 💡',
                'likes' => 156, 'retweets' => 34, 'replies' => 12, 'time' => '4h'
            ]
        ],
        'react' => [
            [
                'user' => ['name' => 'React Master', 'username' => 'reactmaster', 'avatar' => '⚛️'],
                'text' => 'New #React hooks are game changers! Just refactored my entire component library and the code is so much cleaner now. 🎯',
                'likes' => 567, 'retweets' => 123, 'replies' => 45, 'time' => '1h'
            ]
        ],
        'nodejs' => [
            [
                'user' => ['name' => 'Backend Pro', 'username' => 'backendpro', 'avatar' => '🔧'],
                'text' => 'Just deployed a #NodeJS microservice that handles 10k requests per second. The performance is incredible! ⚡',
                'likes' => 445, 'retweets' => 98, 'replies' => 34, 'time' => '2h'
            ]
        ],
        'python' => [
            [
                'user' => ['name' => 'Python Dev', 'username' => 'pythondev', 'avatar' => '🐍'],
                'text' => 'Just finished a machine learning project with #Python. The libraries available make complex tasks so simple! 🤖',
                'likes' => 678, 'retweets' => 156, 'replies' => 78, 'time' => '1h'
            ]
        ]
    ];
    
    $hashtag_key = strtolower($hashtag);
    if (isset($mock_tweets[$hashtag_key])) {
        echo json_encode(['tweets' => $mock_tweets[$hashtag_key]]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'No tweets found for this hashtag']);
    }
    exit();
}

// Real Twitter API call
$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Authorization: Bearer $bearer_token\r\n"
    ]
]);

$response = file_get_contents($api_url, false, $context);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch tweets']);
    exit();
}

$data = json_decode($response, true);

if (isset($data['errors'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Twitter API error: ' . $data['errors'][0]['detail']]);
    exit();
}

// Format response for frontend
$formatted_tweets = [];
if (isset($data['data'])) {
    foreach ($data['data'] as $tweet) {
        $author = null;
        if (isset($data['includes']['users'])) {
            foreach ($data['includes']['users'] as $user) {
                if ($user['id'] === $tweet['author_id']) {
                    $author = $user;
                    break;
                }
            }
        }
        
        $formatted_tweets[] = [
            'user' => [
                'name' => $author['name'] ?? 'Unknown User',
                'username' => $author['username'] ?? 'unknown',
                'avatar' => $author['profile_image_url'] ?? ''
            ],
            'text' => $tweet['text'],
            'likes' => $tweet['public_metrics']['like_count'] ?? 0,
            'retweets' => $tweet['public_metrics']['retweet_count'] ?? 0,
            'replies' => $tweet['public_metrics']['reply_count'] ?? 0,
            'time' => date('g\h', strtotime($tweet['created_at']))
        ];
    }
}

echo json_encode(['tweets' => $formatted_tweets]);
?>