<?php
// Dummy Payment Gateway for Assignment Testing
class DummyPaymentGateway {
    
    public static function createCheckoutSession($data) {
        // Simulate payment processing
        $session_id = 'cs_test_' . uniqid();
        
        // Store session data in session for success page
        session_start();
        $_SESSION['payment_data'] = [
            'session_id' => $session_id,
            'amount' => $data['amount'],
            'product_name' => $data['product_name'],
            'type' => $data['type'],
            'status' => 'completed'
        ];
        
        return [
            'id' => $session_id,
            'url' => 'dummy_checkout.php'
        ];
    }
    
    public static function retrieveSession($session_id) {
        session_start();
        return $_SESSION['payment_data'] ?? null;
    }
}
?>