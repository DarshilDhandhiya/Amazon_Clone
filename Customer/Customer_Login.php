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
    <link rel="stylesheet" href="../CSS/Customer_Login.css">
</head>
<body>
  <div class="wrapper">
    <div class="modalForm">
        <h2>Login or SighUp</h2>
        <div class="actionBtns">
            <button class="actionBtn userBtn">Login</button>
            <button class="actionBtn SignupBtn">Sign up</button>
            <button class="moveBtn">User</button>
        </div>
        <div>
            <form action="./Login.php" method="POST" class="form user userForm">
                <div class="inputGroup">
                    <input type="email" name="email" placeholder="Enter Email" required>
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

            <form action="./Register.php" method="POST" class="form Signup">

                <div class="inputGroup">
                    <input type="text" name="name" placeholder="Enter Name" required>
                </div>

                <div class="inputGroup">
                    <input type="number" name="mobile" placeholder="Enter Phone No" required>
                </div>

                <div class="inputGroup">
                    <input type="email" name="email" placeholder="Enter Mail" required>
                </div>

                <div class="inputGroup">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>

                <button type="submit" name="register" class="submitBtn" value="Sign up" required>Sign up</button>

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
<script src="../JS/Customer_Login.js"></script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>