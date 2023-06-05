<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-eVKrOwBcKvzqK5+b5cyK2c4pTSeOEH75bTqy92LM3RCPr1s/cCyTfaFTvYWh8jms/9rKXqL0jmEbwawV3n9nUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/View_Cart.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="#" class="amazon-logo"><img src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000" alt="Amazon Logo"></a>

            <a href="Products_Details.php" class="header-cart">
                <i class="fas fa-arrow-left cart-icon"></i>
                <span>Back to Products</span>
            </a>
        </div>
    </header>

    <div class="container">
        <h1>Your Cart</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) { ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td>$<?php echo $item['product_price']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="cart-subtotal">
            Subtotal: <span>$<?php echo $subtotal; ?></span>
        </div>

        <button class="buy-now-button">Buy Now</button>
    </div>
</body>
</html>
