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

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();

// Clear the cart after successful checkout
$_SESSION['cart'] = array();

// Redirect to a success page
header("Location: checkout-success.php");
exit();
