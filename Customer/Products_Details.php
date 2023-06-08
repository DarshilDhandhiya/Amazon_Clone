<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from the URL parameter
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_category = $row['product_category'];
        $product_company = $row['product_company'];
        $product_details = $row['product_details'];

        // Fetch product images$result = $db->query("SELECT image FROM images ORDER BY id DESC"); 
        $image_sql = "SELECT image_path FROM product_images WHERE product_id = $product_id";
        $image_result = $conn->query($image_sql);
        $product_images = [];

        while ($image_row = $image_result->fetch_assoc()) {
            $product_images[] = $image_row['image_path'];
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php }
        

// Add product to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Create cart item array
    $item = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price
    );

    // Add item to cart session variable
    $_SESSION['cart'][] = $item;

    header("Location: cart.php");
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/Products_Details.css">
</head>
<body>
    <?php include '../Header.php'; ?> <br>

    <div class="product-details">
        <div class="product-images">
            <?php foreach ($product_images as $image_path) { ?>
                <img src="./product_images/<?php echo $image_path; ?>" alt="Product Image">
            <?php } ?>
        </div>
        <div class="product-info">
            <h3><?php echo $product_name; ?></h3>
            <p><strong>Price:</strong> &#8377; <?php echo $product_price; ?></p>
            <p><strong>Category:</strong> <?php echo $product_category; ?></p>
            <p><strong>Company:</strong> <?php echo $product_company; ?></p>
            <p><strong>Details:</strong> <?php echo $product_details; ?></p>

            <!-- Add "Add to Cart" button -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
                <button type="submit" name="add_to_cart" class="button">Add to Cart</button>
            </form>
        </div>
    </div>
</body>
</html>
