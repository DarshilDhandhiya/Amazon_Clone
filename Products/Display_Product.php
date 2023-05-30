<!DOCTYPE html>
<html>
<head>
    <title>Display Products</title>
    <style>
        /* CSS styles for the product display */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .product {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
            width: calc(33.33% - 20px);
            vertical-align: top;
            text-align: center;
            transition: box-shadow 0.3s ease;
        }
        
        .product:hover {
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);
        }
        
        .product img {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        
        .product:hover img {
            transform: scale(1.2);
        }
        
        .product h3 {
            margin-top: 10px;
        }
        
        .product p {
            margin-top: 5px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product List</h2>
        <?php
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "ecom";
        
        $conn = new mysqli($servername, $username, $password, $db_name);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                $imagePaths = explode(",", $row["image"]);
                foreach ($imagePaths as $imagePath) {
                    echo '<a href="product_images/' . $imagePath . '" target="_blank">';
                    echo '<img src="product_images/' . $imagePath . '" alt="' . $row["name"] . '">';
                    echo '</a>';
                }
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p>&#8377;' . $row["price"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        
        $conn->close();
        ?>
    </div>
</body>
</html>
