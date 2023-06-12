<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        .payment-method {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .payment-method img {
            height: 30px;
        }

        .payment-method.selected {
            border-color: #007bff;
            background-color: #f7f7f7;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ff9900;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-button:hover {
            background-color: #f29100;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>

        <div class="payment-methods">
            <div class="payment-method" data-method="gpay" onclick="selectPaymentMethod(this)">
                <img src="../Image/Payment/1.png" alt="Google Pay">
                <span>Google Pay</span>
            </div>
            <div class="payment-method" data-method="paytm" onclick="selectPaymentMethod(this)">
                <img src="../Image/Payment/2.png" alt="Paytm">
                <span>Paytm</span>
            </div>
            <div class="payment-method" data-method="razorpay" onclick="selectPaymentMethod(this)">
                <img src="../Image/Payment/3.png" alt="Razorpay">
                <span>Razorpay</span>
            </div>
            <div class="payment-method" data-method="UPI" onclick="selectPaymentMethod(this)">
                <img src="../Image/Payment/4.png" alt="UPI">
                <span>UPI</span>
            </div>
        </div>

        <button class="checkout-button" onclick="checkout()">Checkout</button>
    </div>

    <script>
        let selectedMethod = null;

        function selectPaymentMethod(element) {
            if (selectedMethod) {
                selectedMethod.classList.remove('selected');
            }

            element.classList.add('selected');
            selectedMethod = element;
        }

        function checkout() {
            if (selectedMethod) {
                const paymentMethod = selectedMethod.getAttribute('data-method');
                switch (paymentMethod) {
                    case 'gpay':
                        window.location.href = 'checkout.php';
                        break;
                    case 'paytm':
                        window.location.href = 'checkout.php';
                        break;
                    case 'razorpay':
                        window.location.href = 'checkout.php';
                        break;
                    case 'UPI':
                        window.location.href = 'checkout.php';
                        break;
                    default:
                        alert('Please select a payment method.');
                        break;
                }
            } else {
                alert('Please select a payment method.');
            }
        }
    </script>
</body>
</html>
