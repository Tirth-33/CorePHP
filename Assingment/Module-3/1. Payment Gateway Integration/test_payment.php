<?php
// Quick test script - run this to test payment API
$data = [
    'amount' => 10000, // ₹100.00 in paise
    'currency' => 'inr',
    'payment_method_id' => 'pm_card_visa' // Test payment method
];

$ch = curl_init('http://localhost/Revision/Assingment/Module-3/1.%20Payment%20Gateway%20Integration/payment_gateway.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Response: " . $response;
?>