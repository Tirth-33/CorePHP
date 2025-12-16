<?php
require_once 'dummy_payment.php';

if ($_POST) {
    $amount = intval($_POST['amount']);
    $type = $_POST['type'];
    $product_name = $_POST['product_name'] ?? 'Blog Donation';
    
    try {
        $session = DummyPaymentGateway::createCheckoutSession([
            'product_name' => $product_name,
            'amount' => $amount,
            'type' => $type
        ]);
        
        header('Location: ' . $session['url']);
        exit;
        
    } catch (Exception $e) {
        $error = $e->getMessage();
        include 'error.php';
    }
} else {
    header('Location: index.php');
    exit;
}
?>