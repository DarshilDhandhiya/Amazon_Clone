<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './Razorpay/Razorpay.php';
use Razorpay\Api\Api;

session_start();

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Get the total price from the form data
$totalPrice = $_POST['total_price'];

// Initialize the Razorpay API
$api = new Api('rzp_test_1GaCiVC0yUp5a2', 'Wd0bCMuVME0A1PnRW1r6ubMW');

// Create an order
$orderData = [
    'receipt' => uniqid(),
    'amount' => $totalPrice * 100, // Amount in paise (multiply by 100 for INR)
    'currency' => 'INR',
    'payment_capture' => 1 // Auto-capture payment
];

$order = $api->order->create($orderData);

// Store the order ID in the session
$_SESSION['order_id'] = $order->id;

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Display the payment form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <p>Total Price: <?php echo $totalPrice; ?></p>
    <form action="payment-success.php" method="POST">
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="rzp_test_1GaCiVC0yUp5a2"
                data-amount="<?php echo $totalPrice * 100; ?>"
                data-currency="INR"
                data-order_id="<?php echo $order->id; ?>"
                data-buttontext="Pay with Razorpay"
                data-name="Your Store"
                data-description="Payment for your order"
                data-image="https://your-store.com/logo.png"
                data-prefill.name="John Doe"
                data-prefill.email="john.doe@example.com"
                data-theme.color="#F37254"
        ></script>
    </form>
</body>
</html>
