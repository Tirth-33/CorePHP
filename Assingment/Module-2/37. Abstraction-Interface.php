<?php
// Define the interface
interface PaymentInterface {
    public function processPayment($amount);
    public function refund($transactionId);
}

// Implementing class for Credit Card payments
class CreditCardPayment implements PaymentInterface {
    public function processPayment($amount) {
        echo "💳 Processing ₹{$amount} via Credit Card...<br>";
        // Simulate transaction ID
        return "CC_TXN_" . rand(1000, 9999);
    }

    public function refund($transactionId) {
        echo "↩️ Refunding transaction {$transactionId} via Credit Card...<br>";
    }
}

// Implementing class for PayPal payments
class PaypalPayment implements PaymentInterface {
    public function processPayment($amount) {
        echo "🅿️ Processing ₹{$amount} via PayPal...<br>";
        // Simulate transaction ID
        return "PP_TXN_" . rand(1000, 9999);
    }

    public function refund($transactionId) {
        echo "↩️ Refunding transaction {$transactionId} via PayPal...<br>";
    }
}

// Example usage
$creditCard = new CreditCardPayment();
$paypal     = new PaypalPayment();

echo "=== Credit Card Transaction ===<br>";
$ccTxn = $creditCard->processPayment(1500);
$creditCard->refund($ccTxn);

echo "\n=== PayPal Transaction ===<br>";
$ppTxn = $paypal->processPayment(850);
$paypal->refund($ppTxn);
?>