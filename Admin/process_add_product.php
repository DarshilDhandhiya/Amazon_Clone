<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_category = $_POST['product_category'];
$product_company = $_POST['product_company'];
$product_details = $_POST['product_details'];

// Prepare SQL statement to insert the product into the database
$stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_category, product_company, product_details) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsds", $product_name, $product_price, $product_category, $product_company, $product_details);

// Execute the prepared statement
$stmt->execute();

// Get the last inserted product ID
$product_id = $stmt->insert_id;

// Upload product images
$targetDir = "product_images/";
$allowedExtensions = ["jpg", "jpeg", "png"];

if (!empty(array_filter($_FILES['product_image']['name']))) {
    foreach ($_FILES['product_image']['name'] as $key => $name) {
        $targetFile = $targetDir . basename($name);
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            move_uploaded_file($_FILES['product_image']['tmp_name'][$key], $targetFile);

            // Store the image file path in the database
            $imagePath = $targetDir . $name;
            $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
            $stmt->bind_param("is", $product_id, $imagePath);
            $stmt->execute();
        }
    }
}

// Close the database connection
$stmt->close();
$conn->close();

// Redirect back to the admin add product page
header("Location: admin_add_product.php");
exit();
?>
