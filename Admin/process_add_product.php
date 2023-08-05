<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Include the database configuration file  
require_once 'dbConfig.php'; 

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

// // Upload product images
// // If file upload form is submitted 
// $status = $statusMsg = ''; 
// if(isset($_POST["submit"])){ 
//     $status = 'error'; 
//     if(!empty($_FILES["image"]["name"])) { 
//         // Get file info 
//         $fileName = basename($_FILES["image"]["name"]); 
//         $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
//         // Allow certain file formats 
//         $allowTypes = array('jpg','png','jpeg','gif'); 
//         if(in_array($fileType, $allowTypes)){ 
//             $image = $_FILES['image']['tmp_name']; 
//             $imgContent = addslashes(file_get_contents($image)); 
         
//             // Insert image content into database 
//             $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
             
//             if($insert){ 
//                 $status = 'success'; 
//                 $statusMsg = "File uploaded successfully."; 
//             }else{ 
//                 $statusMsg = "File upload failed, please try again."; 
//             }  
//         }else{ 
//             $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
//         } 
//     }else{ 
//         $statusMsg = 'Please select an image file to upload.'; 
//     } 
// } 
 


// // Display status message 
// echo $statusMsg; 
// $insert->close();
// $conn->close();






// //method 2


// $image=$_FILES['product_image'];

// // Create connection
// $conn = new mysqli($servername, $username, $password, $db_name);


// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Upload product images
// $targetDir = "product_images/";
// $allowedExtensions = ["jpg", "jpeg", "png"];

// if (!empty(array_filter($_FILES['product_image']['name']))) {
//     foreach ($_FILES['product_image']['name'] as $key => $name) {
//         $targetFile = $targetDir . basename($name);
//         $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//         if (in_array($fileExtension, $allowedExtensions)) {
//             move_uploaded_file($_FILES['product_image']['tmp_name'][$key], $targetFile);

//             // Store the image file path in the database
//             $imagePath = $targetDir . $name;
//             $stmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
//             $stmt->bind_param($product_id, $imagePath);
//             $stmt->execute();
//         }
//     }
// }

// Close the database connection
$stmt->close();
$conn->close();

// Redirect back to the admin add product page
header("Location: admin_add_product.php");
exit();
?>
