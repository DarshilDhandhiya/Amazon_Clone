<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['admin'])) {
    header("Location: admin-orders.php");
    exit();
}

// Process the login form submission
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the admin credentials (replace with your own validation logic)
    if ($username === 'admin' && $password === 'admin123') {
        // Set the admin session variable
        $_SESSION['admin'] = true;

        // Redirect to the admin orders page
        header("Location: admin-orders.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>Admin Login</h1>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="admin-login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
