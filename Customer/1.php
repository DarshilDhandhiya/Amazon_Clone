<?php
    require './Razorpay/Razorpay.php';

    // Razorpay API credentials
    $keyId = 'YOUR_RAZORPAY_KEY_ID';
    $keySecret = 'YOUR_RAZORPAY_KEY_SECRET';

    // Create a new instance of the Razorpay client
    $razorpay = new Razorpay\Api\Api($keyId, $keySecret);
?>
<!DOCTYPE html>
<!-- Rest of the code remains the same -->



Update the "checkout-process.php" file with the following code to handle the Razorpay payment processing:
php
Copy code
<?php
// Start the session (if not already started)
session_start();

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Calculate the total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $product) {
    $totalPrice += $product['product_price'] * $product['quantity'];
}

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the order details into the database
$stmt = $conn->prepare("INSERT INTO orders (product_name, product_price, quantity, total_price) VALUES (?, ?, ?, ?)");

// Bind the parameters to the SQL statement
$stmt->bind_param("ssdd", $productName, $productPrice, $quantity, $totalPrice);

// Insert each product from the cart into the database
foreach ($_SESSION['cart'] as $product) {
    $productName = $product['product_name'];
    $productPrice = $product['product_price'];
    $quantity = $product['quantity'];

    // Execute the SQL statement
    $stmt->execute();
}

// Close the database connection
$stmt->close();
$conn->close();

// Razorpay payment processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['razorpay_payment_id'])) {
    $paymentId = $_POST['razorpay_payment_id'];

    // Verify the payment signature
    $success = false;

    try {
        $attributes = array(
            'razorpay_order_id' => $_POST['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $razorpay->utility->verifyPaymentSignature($attributes);
        $success = true;
    } catch (Exception $e) {
        $success = false;
    }

    if ($success) {
        // Clear the cart after successful payment
        $_SESSION['cart'] = array();

        // Redirect to a success page
        header("Location: checkout-success.php");
        exit();
    } else {
        // Redirect to a failure page
        header("Location: checkout-failure.php");
        exit();
    }
} else.