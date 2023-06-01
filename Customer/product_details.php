<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Retrieve the product ID from the query parameter
$productID = $_GET['id'];

// Retrieve the product details from the database based on the ID
$selectQuery = "SELECT * FROM products WHERE product_id = $productID";
$result = $conn->query($selectQuery);
$product = $result->fetch_assoc();
?>

<div class="product-details">
    <div class="product-image">
        <img src="product_images/<?php echo $product['image_path']; ?>" alt="Product Image">
    </div>
    <div class="product-info">
        <h1><?php echo $product['product_name']; ?></h1>
        <p><?php echo $product['product_price']; ?></p>
        <p><?php echo $product['product_details']; ?></p>

        <!-- Add "Buy Now" and "Add to Cart" buttons -->
        <button onclick="buyNow(<?php echo $product['product_id']; ?>)">Buy Now</button>
        <button onclick="addToCart(<?php echo $product['product_id']; ?>)">Add to Cart</button>
    </div>
</div>
<script>
    function buyNow(productID) {
        // Implement the logic for handling the "Buy Now" action
        // You can redirect the user to a checkout page or perform any other required action
        alert("Product ID " + productID + " added to cart");
    }

    function addToCart(productID) {
        // Implement the logic for handling the "Add to Cart" action
        // You can add the product to the shopping cart and perform any other required action
        alert("Product ID " + productID + " added to cart");
    }
</script>

</body>
</html>