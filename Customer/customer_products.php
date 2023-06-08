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

        .product-photos {
            display: flex;
            flex-wrap: wrap;
        }

        .button {
        display: inline-block;
        background-color: #febd68;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #131921;
        color: white;
    }

    </style>
</head>
<body>

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
                <p><strong>Price:</strong> &#8377; <?php echo $product_price; ?></p>
                <p><strong>Category:</strong> <?php echo $product_category; ?></p>
                <p><strong>Company:</strong> <?php echo $product_company; ?></p>

                <div class="product-photos">
                    <?php foreach ($product_images as $image_path) { ?>
                        <img src="./product_images/<?php echo $image_path; ?>" alt="Product Image">
                    <?php } ?>
                </div><br>

                <a href="Products_Details.php?id=<?php echo $product_id; ?>" class="button">View Details</a>
                
            </div>
        <?php } ?>
        <?php
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
