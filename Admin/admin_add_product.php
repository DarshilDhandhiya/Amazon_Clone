<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
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
    <h2>Add Product</h2>
    <form action="process_add_product.php" method="post" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" required><br><br>
        
        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" required><br><br>
        
        <label for="product_category">Product Category:</label>
        <select name="product_category" id="product_category" required>
            <option value="">-- Category --</option>
            <option value="mobile">Mobile</option>
            <option value="watch">Watch</option>
            <option value="speaker">Speaker</option>
            <option value="tv">TV</option>
            <option value="camera">Camera</option>
        </select><br><br>
        
        <label for="product_company">Product Company:</label>
        <select name="product_company" id="product_company">
            <option value="">-- Select --</option>
        </select><br><br>
        
        <label for="product_details">Product Details:</label>
        <textarea name="product_details" id="product_details" required></textarea><br><br>
        
        <label for="product_image">Product Image:</label>
        <input type="file" name="product_image[]" id="product_image" multiple required><br><br>
        
        <input type="submit" value="Add Product">
    </form>


    <h2>Existing Products</h2>
<div class="product-list">
    <?php
    // Fetch existing products from the database
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
                    <img src="<?php echo $image_path; ?>" alt="Product Image">
                <?php } ?>
            </div>
        </div>
    <?php } 
    // Process image upload
$targetDir = "product_images/"; // Set the target directory
$uploadedImages = [];

foreach ($_FILES['product_images']['tmp_name'] as $key => $tmp_name) {
    $fileName = $_FILES['product_images']['name'][$key];
    $targetFilePath = $targetDir . $fileName;

    // Check if file already exists
    if (file_exists($targetFilePath)) {
        // Handle duplicate file names if needed
    }

    // Move the uploaded file to the target directory
    move_uploaded_file($tmp_name, $targetFilePath);
    $uploadedImages[] = $targetFilePath;
}

// Insert product information into the database
$insertQuery = "INSERT INTO products (product_name, product_price, product_category, product_company, product_details) 
               VALUES ('$product_name', '$product_price', '$product_category', '$product_company', '$product_details')";
$conn->query($insertQuery);

// Get the last inserted product ID
$productID = $conn->insert_id;

// Insert image paths into the product_images table
foreach ($uploadedImages as $imagePath) {
    $insertImageQuery = "INSERT INTO product_images (product_id, image_path) VALUES ('$productID', '$imagePath')";
    $conn->query($insertImageQuery);
}

?>
</div>




    <script>
        var subMenuOptions = {
            mobile: ["Apple", "OnePlus", "Pixel", "Realme", "Samsung", "Sony"],
            watch: ["Fastrack", "Fossil", "Noise"],
            speaker: ["Boat", "Bose", "JBL"],
            tv: ["LG", "Panasonic", "Vu"],
            camera: ["Canon", "Casio", "Nikon"]
        };

        var categorySelect = document.getElementById("product_category");
        var companySelect = document.getElementById("product_company");

        categorySelect.addEventListener("change", function() {
            var selectedSubMenuOptions = subMenuOptions[this.value];
            while (companySelect.firstChild) {
                companySelect.removeChild(companySelect.firstChild);
            }

            if (selectedSubMenuOptions) {
                for (var i = 0; i < selectedSubMenuOptions.length; i++) {
                    var option = document.createElement("option");
                    option.value = selectedSubMenuOptions[i];
                    option.text = selectedSubMenuOptions[i];
                    companySelect.appendChild(option);
                }
            }
        });
    </script>
</body>
</html>
