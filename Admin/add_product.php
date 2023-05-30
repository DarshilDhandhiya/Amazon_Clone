<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$price = $_POST['price'];
$details = $_POST['details'];

$targetDir = "product_images/";
$images = array();

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $imageFileType = strtolower(pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION));
    $imageName = uniqid() . '.' . $imageFileType;
    $targetFile = $targetDir . $imageName;

    move_uploaded_file($tmp_name, $targetFile);

    $images[] = $imageName;
}

$sql = "INSERT INTO products (name, price, details, image) VALUES ('$name', '$price', '$details', '" . implode(",", $images) . "')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
