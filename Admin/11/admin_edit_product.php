<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container h2 {
            text-align: center;
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
        }

        .form-container input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Product</h2>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Create a connection to the database
            $conn = mysqli_connect($servername, $username, $password, $db_name);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve product details from the database
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);
                ?>
                <form action="process_edit_product.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="product_name" id="product_name" value="<?php echo $product['name']; ?>" required><br><br>

                    <label for="product_price">Product Price:</label>
                    <input type="number" name="product_price" id="product_price" value="<?php echo $product['price']; ?>" required><br><br>

                    <label for="product_category">Product Category:</label>
                    <select name="product_category" id="product_category" required>
                        <option value="">-- Category --</option>
                        <option value="mobile" <?php if ($product['category'] === 'mobile') echo 'selected'; ?>>Mobile</option>
                        <option value="watch" <?php if ($product['category'] === 'watch') echo 'selected'; ?>>Watch</option>
                        <option value="speaker" <?php if ($product['category'] === 'speaker') echo 'selected'; ?>>Speaker</option>
                        <option value="tv" <?php if ($product['category'] === 'tv') echo 'selected'; ?>>TV</option>
                        <option value="camera" <?php if ($product['category'] === 'camera') echo 'selected'; ?>>Camera</option>
                    </select><br><br>

                    <label for="product_company">Product Company:</label>
                    <select name="product_company" id="product_company" required>
                        <option value="">-- Select --</option>
                        <?php
                        $selected_category = $product['category'];

                        // Retrieve company options based on selected category
                        $sql = "SELECT DISTINCT company FROM products WHERE category = '$selected_category'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $company = $row['company'];
                                $selected = ($company === $product['company']) ? 'selected' : '';
                                echo "<option value=\"$company\" $selected>$company</option>";
                            }
                        }
                        ?>
                    </select><br><br>

                    <label for="product_details">Product Details:</label>
                    <textarea name="product_details" id="product_details" rows="10" cols="50" required><?php echo $product['details']; ?></textarea><br><br>

                    <label for="product_image">Product Image:</label>
                    <input type="file" name="product_image[]" id="product_image" multiple><br><br>

                    <input type="submit" value="Update Product">
                </form>
                <?php
            } else {
                echo 'No product found.';
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo 'Product ID not specified.';
        }
        ?>
    </div>
</body>
</html>
