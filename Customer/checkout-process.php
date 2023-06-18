<?php
// Start the session (if not already started)
session_start();

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Get the total price from the form data
$totalPrice = $_POST['total_price'];

// Initialize the Razorpay API
$api = new Api(' rzp_test_1GaCiVC0yUp5a2', 'Wd0bCMuVME0A1PnRW1r6ubMW');

// Create an order
$orderData = [
    'receipt' => uniqid(),
    'amount' => $totalPrice * 100, // Amount in paise (multiply by 100 for INR)
    'currency' => 'INR',
    'payment_capture' => 1 // Auto-capture payment
];

$order = $api->order->create($orderData);

// Redirect the user to the Razorpay payment page
header('Location: ' . $order['url']);
exit();

?>