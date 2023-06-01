<!DOCTYPE html>
<html>
<head>
    <title>Customer Page</title>
    <!-- Add any necessary CSS styles -->
    <style>
        .product-list {
            display: flex;
            flex-wrap: wrap;
        }

        .product {
            width: 300px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .product h3 {
            margin-top: 0;
        }

        .product-photos {
            display: flex;
            flex-wrap: wrap;
        }

        .product-photos img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Customer Page</h2>

    <div class="product-list">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "ecom";

        $conn = new mysqli($servername, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch products from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        // Display each product
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_category = $row['product_category'];
            $product_company = $row['product_company'];
            $product_details = $row['product_details'];

            // Fetch product images
            $image_sql = "SELECT image_path FROM product_images WHERE product_id = $product_id";
            $image_result = $conn->query($image_sql);
            $product_images = [];

            while ($image_row = $image_result->fetch_assoc()) {
                $product_images[] = $image_row['image_path'];
            }
            ?>
            
            <div class="product">
                <h3><?php echo $product_name; ?></h3>
                <p><strong>Price:</strong> $<?php echo $product_price; ?></p>
                <p><strong>Category:</strong> <?php echo $product_category; ?></p>
                <p><strong>Company:</strong> <?php echo $product_company; ?></p>
                <p><strong>Details:</strong> <?php echo $product_details; ?></p>

                <div class="product-photos">
    <?php foreach ($product_images as $image_path) { ?>
        <img src="./product_images/<?php echo $image_path; ?>" alt="Product Image">
    <?php } ?>
</div>

<div class="products">
    <?php foreach ($products as $product) { ?>
        <div class="product">
            <img src="product_images/<?php echo $product['image_path']; ?>" alt="Product Image">
            <h3><?php echo $product['product_name']; ?></h3>
            <p><?php echo $product['product_price']; ?></p>
            <a href="product_details.php?id=<?php echo $product['product_id']; ?>">View Details</a>

            <!-- Add "Add to Cart" button -->
            <button onclick="addToCart(<?php echo $product['product_id']; ?>)">Add to Cart</button>
        </div>
    <?php } ?>
</div>

<script>
    function addToCart(productID) {
        // Implement the logic for handling the "Add to Cart" action
        // You can use AJAX or submit a form to add the product to the shopping cart

        // For demonstration purposes, displaying an alert with the product ID
        alert("Product ID " + productID + " added to cart");
    }
</script>



            </div>
        <?php } ?>
        <?php
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
