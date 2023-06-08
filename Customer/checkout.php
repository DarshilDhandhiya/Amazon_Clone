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

// Process the checkout
if (isset($_POST['submit'])) {
    // Perform any necessary processing, such as saving order details to the database

    // Clear the cart after successful checkout
    $_SESSION['cart'] = array();

    // Redirect to a success page
    header("Location: checkout-success.php");
    exit();
}

// Display the checkout page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        .header {
            background: #131921;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .amazon-logo img {
            height: 40px;
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .checkout-container h1 {
            margin-top: 0;
        }

        .order-summary {
            margin-bottom: 20px;
        }

        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-summary th,
        .order-summary td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .order-total {
            font-weight: bold;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 8px 10px;
            border: none;
            background-color: #febd69;
            color: #111;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #fdba4e;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="amazon-logo">
        <a href="Customer_Home.php">
            <img src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000" alt="Amazon Logo">
            </a>
        </div>
    </div>

    <div class="checkout-container">
        <h1>Checkout</h1>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $product): ?>
                    <tr>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['product_price']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo $product['product_price'] * $product['quantity']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="order-total">Total</td>
                    <td><?php echo $totalPrice; ?></td>
                </tr>
            </table>
        </div>

        <form action="checkout-process.php" method="post">
    <input type="submit" name="submit" class="checkout-button" value="Place Order">
</form>


    </div>
</body>
</html>
