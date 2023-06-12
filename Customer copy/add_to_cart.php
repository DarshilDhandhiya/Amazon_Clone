<?php
// Start the session (if not already started)
session_start();

// Check if the product ID is provided in the request
if(isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecom";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Fetch the product details from the database
    $sql = "SELECT * FROM products WHERE product_id = $productId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Add the product to the cart session variable
        $_SESSION['cart'][] = $row;
        
        // Redirect to the cart page
        header("Location: cart.php");
        exit();
    }
    
    $conn->close();
}
