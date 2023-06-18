<?php
require 'Razorpay/Razorpay.php';

use Razorpay\Api\Api;

$apiKey = 'your_api_key';
$apiSecret = 'your_api_secret';

$api = new Api($apiKey, $apiSecret);

$orderID = $_POST['id']; // Assuming the order ID is stored in the 'id' column of the 'orders' table

try {
    $order = $api->order->fetch($orderID);

    // Check if the payment is successful
    if ($order->status === 'paid') {
        // Payment successful, do something
        echo 'Payment successful!';
    } else {
        // Payment failed, do something
        echo 'Payment failed!';
    }
} catch (Exception $e) {
    // An error occurred
    echo 'Error: ' . $e->getMessage();
}
?>

<!-- 
ecom
    ->products
        ->product_id
        ->product_name
        ->product_price
        ->product_category
        ->product_company
        ->product_details

    ->orders
        ->id
        ->product_name
        ->product_price
        ->quantity
        ->total_price 
-->