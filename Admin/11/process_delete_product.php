<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete product from the database
    $sql = "DELETE FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect back to the product list page with a success message
        header('Location: admin_product_list.php?success=1');
        exit;
    } else {
        echo 'Error deleting product: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'Invalid request.';
}
?>
