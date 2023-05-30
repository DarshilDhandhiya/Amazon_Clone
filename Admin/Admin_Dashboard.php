<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/2e64c661d0.js" crossorigin="anonymous"></script>
  <title>Amazon Clone</title>
  <!-- <link rel="shortcut icon" href="https://wallpapercave.com/dwp1x/wp7771193.jpg" type="image/x-icon" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/Style.css" />
  <link rel="stylesheet" href="../CSS/Admin_dashboard.css" />
</head>
<body>
    <!-- NAVBAR -->
  <header class="header">
    <a name="nav-top"></a>
    <nav class="header-nav">
      <div class="header-container">

        <a href="../index.php" class="amazon-logo"><img
            src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000"
            class="amazon-logo" style="cursor:pointer"></a>

      </div>
      <div></div>
    </nav>
  </header>


  
  <!-- Navbar -->
  <div class="navbar">
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="./manage_products.php">Manage Products</a></li>
            <li><a href="./admin_add_product.php">Add Product</a></li>
            <li><a href="./edit_product.php">Edit Product</a></li>
            <li><a href="./delete_product.php">Delete Product</a></li>
            <li><a href="#">View Orders</a></li>
            <li><a href="#">Manage Orders</a></li>
            <li><a href="./A_Logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Welcome, Admin!</h2>
        
        <h3>Dashboard</h3>
        <p>This is the admin dashboard page.</p>
        
        <h3>Manage Products</h3>
        <ul>
            <li><a href="#">Manage Product</a></li>
            <li><a href="#">Add Product</a></li>
            <li><a href="#">Edit Product</a></li>
            <li><a href="#">Delete Product</a></li>
        </ul>
        
        <h3>Manage Orders</h3>
        <ul>
            <li><a href="#">View Orders</a></li>
            <li><a href="#">Manage Orders</a></li>
        </ul>

        <h3>Logout</h3>
        <ul>
            <li><a href="./A_Logout.php">Logout</a></li>
        </ul>
    </div>

  <script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
  </script>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    
</body>
</html>