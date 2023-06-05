<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_company = $_POST['product_company'];
    $product_details = $_POST['product_details'];

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

    // Create product array
    $product = array(
        'name' => $product_name,
        'price' => $product_price,
        'category' => $product_category,
        'company' => $product_company,
        'details' => $product_details,
        'images' => $uploaded_images
    );

    // Get existing products from file
    $products = array();
    if (file_exists('products.json')) {
        $products = json_decode(file_get_contents('products.json'), true);
    }

    // Add the new product to the array
    $products[] = $product;

    // Save the updated product array to file
    file_put_contents('products.json', json_encode($products));

    // Redirect back to the add product page with a success message
    header('Location: admin_add_product.php?success=1');
    exit;
}
?>
