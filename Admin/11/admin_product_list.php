<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>Product List</h2>
    <?php
    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch products from the database
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>Product Name</th><th>Price</th><th>Category</th><th>Company</th><th>Actions</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['product_name'] . '</td>';
            echo '<td>' . $row['product_price'] . '</td>';
            echo '<td>' . $row['product_category'] . '</td>';
            echo '<td>' . $row['product_company'] . '</td>';
            echo '<td>';
            echo '<a href="admin_edit_product.php?id=' . $row['product_id'] . '">Edit</a> | ';
            echo '<form method="post" action="process_delete_product.php" style="display: inline-block;">';
            echo '<input type="hidden" name="id" value="' . $row['product_id'] . '">';
            echo '<input type="submit" value="Delete" onclick="return confirm(\'Are you sure?\');">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No products found.';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
