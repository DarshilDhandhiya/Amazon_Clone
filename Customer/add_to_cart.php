<?php
session_start(); // Start the session (if not already started)

// Check if the product ID is provided
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Check if the product exists in your database and retrieve its details
    // Here, you would typically query your products table based on the provided $product_id
    // and store the product details in the $product variable
    // Example query: SELECT * FROM products WHERE id = $product_id
    // $product = <result of the query>

    // If the product is found
    if ($product) {
        // Check if the cart already exists in the session, or create a new one
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        } else {
            $cart = array();
        }

        // Check if the product is already in the cart
        $found = false;
        foreach ($cart as &$cart_item) {
            if ($cart_item['product_id'] == $product_id) {
                // Increase the quantity if the product is already in the cart
                $cart_item['quantity']++;
                $found = true;
                break;
            }
        }

        // If the product is not already in the cart, add it as a new item
        if (!$found) {
            $cart_item = array(
                'product_id' => $product_id,
                'quantity' => 1
            );
            $cart[] = $cart_item;
        }

        // Update the cart in the session
        $_SESSION['cart'] = $cart;

        // Redirect the user to the cart page or any other appropriate page
        header('Location: View_Cart.php');
        exit();
    } else {
        // Product not found, handle error or redirect to an appropriate page
        echo "Product not found.";
    }
} else {
    // Product ID not provided, handle error or redirect to an appropriate page
    echo "Invalid product ID.";
}
?>
