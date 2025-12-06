<?php
// Mock payment test without Stripe
header("Content-Type: application/json");

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['amount'])) {
    echo json_encode(['error' => 'Missing amount']);
    exit;
}

// Simulate success for amounts under ₹500
if ($input['amount'] < 50000) {
    echo json_encode([
        'success' => true,
        'payment_intent_id' => 'pi_mock_' . time(),
        'status' => 'succeeded'
    ]);
} else {
    echo json_encode(['error' => 'Card declined']);
}
?>