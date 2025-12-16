<?php
// Simple Stripe implementation without Composer for testing
class SimpleStripe {
    private $secret_key;
    
    public function __construct($secret_key) {
        $this->secret_key = $secret_key;
    }
    
    public function createCheckoutSession($data) {
        $url = 'https://api.stripe.com/v1/checkout/sessions';
        
        $postData = http_build_query([
            'payment_method_types[]' => 'card',
            'line_items[0][price_data][currency]' => 'inr',
            'line_items[0][price_data][product_data][name]' => $data['product_name'],
            'line_items[0][price_data][unit_amount]' => $data['amount'],
            'line_items[0][quantity]' => 1,
            'mode' => 'payment',
            'success_url' => $data['success_url'],
            'cancel_url' => $data['cancel_url'],
            'metadata[type]' => $data['type']
        ]);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->secret_key,
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode !== 200) {
            throw new Exception('Stripe API Error: ' . $response);
        }
        
        return json_decode($response, true);
    }
}
?>