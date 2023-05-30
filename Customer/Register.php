<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "ecom";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: Customer_Login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>