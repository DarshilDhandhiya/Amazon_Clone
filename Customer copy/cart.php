<?php
// Start the session (if not already started)
session_start();

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

$conn = new mysqli($servername, $username, $password, $db_name);

// Function to update the quantity of a product in the cart
function updateQuantity($productId, $quantity) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$product) {
            if ($product['product_id'] == $productId) {
                $product['quantity'] = $quantity;
                break;
            }
        }
    }
}

// Function to remove a product from the cart
function removeProduct($productId) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['product_id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        // Reset array keys after removing a product
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Check if the product ID is provided in the request (for quantity update or deletion)
if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $action = $_GET['action'];
    $productId = $_GET['product_id'];

    if ($action === 'update' && isset($_POST['quantity'])) {
        $quantity = (int)$_POST['quantity'];
        updateQuantity($productId, $quantity);
    } elseif ($action === 'delete') {
        removeProduct($productId);
    }

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}

// Calculate the subtotal
$subTotal = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $subTotal += $product['product_price'] * $product['quantity'];
    }
}

// Fetch product category from the database
$products = [];
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $productIds = array_column($_SESSION['cart'], 'product_id');
    $productIds = implode(',', $productIds);

    $sql = "SELECT product_id, product_category FROM products WHERE product_id IN ($productIds)";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[$row['product_id']] = $row['product_category'];
        }
    }
}

// Display the cart page
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Cart</title>
    <link rel="stylesheet" href="../CSS/View_Cart.css">
</head>
<body>
    <div class="header">
        <div class="amazon-logo">
        <a href="Customer_Home.php">
            <img src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000" alt="Amazon Logo">
            </a>
        </div>
        
    </div>

    <h1>Cart</h1>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $product): ?>
                <tr>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['product_price']; ?></td>
                    <td>
                    <form action="cart.php?action=update&product_id=<?php echo $product['product_id']; ?>" method="post">
                            <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" min="1">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    <td><?php echo $products[$product['product_id']]; ?></td>
                    <td><?php echo $product['product_price'] * $product['quantity']; ?></td>
                    <td>
                        <a href="cart.php?action=delete&product_id=<?php echo $product['product_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Subtotal:</td>
                <td><?php echo $subTotal; ?></td>
                <td></td>
            </tr>
        </table><br>

        <form action="Payment.php" method="post">
            <input type="submit" class="buy-now-button" value="Buy Now">
        </form><br>
        <form action="Customer_Home.php" method="post">
            <input type="submit" class="buy-now-button" value="Click here to add more items">
        </form>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <a href="Customer_Home.php">Home</a>
</body>
</html>
