<?php
//create code
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <title>Edit Product</title>
</head>

<body>

    <div id="container">
        <header>
            <h1>Edit Product</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage_products.php">Manage Products</a></li>
                </ul>
            </nav>
        </header>

        <div id="editProductForm">
            <form action="" method="post">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" value="<?php echo $product['productname']; ?>" required>
                <label for="productDescription">Product Description:</label>
                <textarea id="productDescription" name="productDescription" required><?php echo $product['short_description']; ?></textarea>
                <label for="imageURL">Image URL:</label>
                <input type="text" id="imageURL" name="imageURL" value="<?php echo $product['image_url']; ?>" required>
                <input type="submit" value="Update Product">
            </form>
        </div>

    </div>

</body>

</html>