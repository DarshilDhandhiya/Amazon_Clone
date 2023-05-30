<?php
session_start();

// Clear user session data
unset($_SESSION['user_id']);
unset($_SESSION['username']);

// Clear admin session data
unset($_SESSION['admin_id']);
unset($_SESSION['admin_username']);

// For user logout:
header("Location: ../index.php");
// For admin logout:
header("Location: Admin_Login.php");
?>
