<?php
    include("logic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bing's Cars™</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
    <div id="page">
        <?php include("phpContent/header.php"); ?>
        <?php include("phpContent/hero.php"); ?>
        <main>
            <div class="showcase">
                <div class="sectionHeadding">
                    <h1>Pick one of our popular cars!</h1>
                    <hr>
                </div>
                <ul class="carsList">
                    <?php for($i = 0; $i < 6; $i++) { ?>
                    <li class="carTile">
                        <img src="assets/car1.png" alt="carImg">
                        <h2>Hyonda</h2>
                        <h3>e 120.000</h3>
                        <p>Beautifull car that can last for years to come.</p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="companyInfo">
                <h2>Who is Bing cars?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis posuere nulla, quis ultrices quam sollicitudin ut. Maecenas ac arcu ullamcorper, aliquam dui vel, scelerisque turpis. Vivamus urna sem, rutrum sed arcu in, cursus dictum diam. Vestibulum bibendum vulputate magna et sagittis. Nullam nunc mauris, laoreet at eros id, maximus ullamcorper lectus. Nulla rhoncus quam eu tristique viverra. Cras risus dolor, pellentesque molestie dictum quis, blandit a augue. Cras pharetra massa ut nisi ullamcorper, ut cursus lorem dictum. Quisque vulputate orci malesuada massa porta sagittis. Aliquam sit amet dui quis ex vehicula placerat.</p>
            </div>
        </main>
        <?php include("phpContent/footer.php"); ?>
    </div>
</body>
</html>