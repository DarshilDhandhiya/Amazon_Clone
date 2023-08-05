<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../CSS/Admin_Login.css">
</head>
<body>
  <div class="wrapper">
    <div class="modalForm"><br>
        <h2>Admin Login</h2><br>
        <div>
            <form action="./A_Login.php" method="POST">
                <div class="inputGroup">
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <div class="inputGroup">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>

                <button type="submit" name="login" class="submitBtn" value="Login">Login</button><br><br>

                <?php if (!empty($errorMsg)): ?>
                    <p style="color: red;"><?php echo $errorMsg; ?></p>
                <?php endif; ?>

                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>  
            </form>
        </div>
    </div>
  </div>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>