<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container h2 {
            text-align: center;
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
        }

        .form-container input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Product</h2>
        <form action="process_add_product.php" method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" required><br><br>

            <label for="product_price">Product Price:</label>
            <input type="number" name="product_price" id="product_price" required><br><br>

            <label for="product_category">Product Category:</label>
            <select name="product_category" id="product_category" required>
                <option value="">-- Category --</option>
                <option value="mobile">Mobile</option>
                <option value="watch">Watch</option>
                <option value="speaker">Speaker</option>
                <option value="tv">TV</option>
                <option value="camera">Camera</option>
            </select><br><br>

            <label for="product_company">Product Company:</label>
            <select name="product_company" id="product_company">
                <option value="">-- Select --</option>
            </select><br><br>

            <label for="product_details">Product Details:</label>
            <textarea name="product_details" id="product_details" rows="10" cols="50" required></textarea><br><br>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image[]" id="product_image" multiple required><br><br>

            <input type="submit" value="Add Product">
        </form>
    </div>

    <script>
        var subMenuOptions = {
            mobile: ["Apple", "OnePlus", "Pixel", "Realme", "Samsung", "Sony"],
            watch: ["Fastrack", "Fossil", "Noise"],
            speaker: ["Boat", "Bose", "JBL"],
            tv: ["LG", "Panasonic", "Vu"],
            camera: ["Canon", "Casio", "Nikon"]
        };

        var categorySelect = document.getElementById("product_category");
        var companySelect = document.getElementById("product_company");

        categorySelect.addEventListener("change", function() {
            var selectedSubMenuOptions = subMenuOptions[this.value];
            while (companySelect.firstChild) {
                companySelect.removeChild(companySelect.firstChild);
            }

            if (selectedSubMenuOptions) {
                for (var i = 0; i < selectedSubMenuOptions.length; i++) {
                    var option = document.createElement("option");
                    option.value = selectedSubMenuOptions[i];
                    option.text = selectedSubMenuOptions[i];
                    companySelect.appendChild(option);
                }
            }
        });
    </script>
</body>
</html>
