<?php

// Simple test file - access via browser: http://localhost/Revision/Assesment/Part-4/test.php

header('Content-Type: application/json');

// Test data
$students = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@test.com', 'student_id' => 'STU001']
];

$grades = [
    ['id' => 1, 'student_id' => 1, 'subject' => 'Math', 'grade' => 85.5, 'semester' => 'Fall 2024'],
    ['id' => 2, 'student_id' => 1, 'subject' => 'Physics', 'grade' => 92.0, 'semester' => 'Fall 2024']
];

$subjects = [
    ['id' => 1, 'name' => 'Mathematics', 'code' => 'MATH101'],
    ['id' => 2, 'name' => 'Physics', 'code' => 'PHYS101']
];

// Simple routing
$path = $_GET['path'] ?? 'test';

switch($path) {
    case 'login':
        if ($_POST['email'] === 'john@test.com' && $_POST['password'] === 'password') {
            echo json_encode([
                'token' => 'test-token-123',
                'student' => $students[0]
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Invalid credentials']);
        }
        break;
        
    case 'grades':
        // Check multiple ways to get Authorization header
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? 
                 getallheaders()['Authorization'] ?? 
                 $_GET['token'] ?? '';
        
        if ($token === 'Bearer test-token-123' || $token === 'test-token-123') {
            echo json_encode([
                'data' => $grades,
                'pagination' => ['current_page' => 1, 'total' => 2, 'per_page' => 10]
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized', 'received_token' => $token]);
        }
        break;
        
    case 'subjects':
        // Check multiple ways to get Authorization header
        $token = $_SERVER['HTTP_AUTHORIZATION'] ?? 
                 getallheaders()['Authorization'] ?? 
                 $_GET['token'] ?? '';
        
        if ($token === 'Bearer test-token-123' || $token === 'test-token-123') {
            echo json_encode($subjects);
        } else {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized', 'received_token' => $token]);
        }
        break;
        
    default:
        echo json_encode([
            'message' => 'Student Grades API Test',
            'endpoints' => [
                'POST ?path=login' => 'Login with email=john@test.com&password=password',
                'GET ?path=grades' => 'Get grades (requires Authorization: Bearer test-token-123)',
                'GET ?path=subjects' => 'Get subjects (requires Authorization: Bearer test-token-123)'
            ]
        ]);
}
?>