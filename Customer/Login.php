<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMsg = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
        header("Location: Customer_Home.php");
        exit();
    } else {
        $errorMsg = "Invalid email or password.";
    }
}
?>
