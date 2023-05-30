<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        /* CSS styles for the form */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Product</h2>
        <form method="post" action="add_product.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
            </div>
            
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea id="details" name="details" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="images">Images:</label>
                <input type="file" id="images" name="images[]" multiple required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Add Product">
            </div>
        </form>
    </div>
</body>
</html>
