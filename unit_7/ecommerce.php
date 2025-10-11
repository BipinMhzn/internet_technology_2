<?php
// Abstract class
abstract class Payment {
    abstract public function pay($amount);
}

class CreditCardPayment extends Payment {
    public function pay($amount) {
        echo "Paid $amount using Credit Card.<br>";
    }
}

class PayPalPayment extends Payment {
    public function pay($amount) {
        echo "Paid $amount via PayPal.<br>";
    }
}

// Using polymorphism
function processPayment(Payment $method, $amount) {
    $method->pay($amount);
}

// Create objects
$credit = new CreditCardPayment();
$paypal = new PayPalPayment();

// Process payments
processPayment($credit, 1000);
processPayment($paypal, 500);
?>
