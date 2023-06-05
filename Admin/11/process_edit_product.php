<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_company = $_POST['product_company'];
    $product_details = $_POST['product_details'];

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update product details in the database
    $sql = "UPDATE products SET name = '$product_name', price = '$product_price', category = '$product_category', company = '$product_company', details = '$product_details' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Handle image upload
        $uploaded_images = array();
        $target_dir = 'product_images/';
        $file_count = count($_FILES['product_image']['name']);

        for ($i = 0; $i < $file_count; $i++) {
            $file_name = $_FILES['product_image']['name'][$i];
            $file_tmp = $_FILES['product_image']['tmp_name'][$i];
            $file_path = $target_dir . $file_name;

            if (move_uploaded_file($file_tmp, $file_path)) {
                $uploaded_images[] = $file_path;
            }
        }

        // Redirect back to the product list page with a success message
        header('Location: admin_product_list.php?success=1');
        exit;
    } else {
        echo 'Error updating product details: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'Invalid request.';
}
?>
