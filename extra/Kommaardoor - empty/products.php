<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['email'])) {
    // header('Location: login.php');
    // exit();
}
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
    <title>Product Management</title>
</head>

<body>

    <div id="container">
        <header>
            <h1>Product Management</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.php">Manager Products</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <?php

    $dbHandler = null;
    try {
        $dbHandler = new PDO("mysql:host=mysql;dbname=kommaardoor;charset=utf8", "root", "qwerty");
    } catch (Exception $ex) {
        echo $ex;
    }

    $stmt = $dbHandler->prepare("SELECT productname, short_description, image_url FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function printCards($products) {
        foreach ($products as $product) {
            echo '<div class="card">';
            echo '<h2>' . htmlspecialchars($product['productname']) . '</h2>';
            echo '<img src="' . htmlspecialchars($product['image_url']) . '">';
            echo '<a class="infoBtn" href="#">' . htmlspecialchars($product['short_description']) . '</a>';
            echo '</div>';
        }
    }
    ?>
    <section class="mainContent">
        <h1>Our products</h1>
            <div id="productContainer">
                <?php printCards($products); ?>
            </div>
    </section>

</body>

</html>