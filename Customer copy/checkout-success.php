<!DOCTYPE html>
<html>
<head>
    <title>Checkout Success</title>
    <style>
        .header {
            background: #131921;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .amazon-logo img {
            height: 40px;
        }

        .success-message {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .back-to-home-button {
            display: block;
            width: 150px;
            padding: 8px 10px;
            border: none;
            background-color: #febd69;
            color: #111;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            cursor: pointer;
        }

        .back-to-home-button:hover {
            background-color: #fdba4e;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="amazon-logo">
        <a href="Customer_Home.php">
            <img src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000" alt="Amazon Logo">
            </a>
        </div>
    </div>

    <div class="success-message">
        <h1>Thank You!</h1>
        <p>Your order has been placed successfully.</p>
        <!-- You can display additional order details here if needed -->
        
        <a href="Customer_Home.php" class="back-to-home-button">Back to Home</a>
    </div>
</body>
</html>
