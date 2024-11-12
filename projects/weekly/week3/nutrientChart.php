<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrient chart</title>
    <link rel="stylesheet" type="text/css" href="nutrientChart.css">
</head>
<body>
    <?php
        function createNutrientChart($calories, $carbs, $protein, $fat, $fitsInMyDiet)
        {
            //params: Calories, Carbs, Protein and Fat. Last parameter is a Boolean
            echo "<table>";
            echo "<tr><th>Calories</th><td>$calories g</td></tr>";
            echo "<tr><th>Carbs</th><td>$carbs g</td></tr>";
            echo "<tr><th>Protein</th><td>$protein g</td></tr>";
            echo "<tr><th>Fat</th><td>$fat g</td></tr>";
            echo "<tr><th>Fits in my diet?</th><td>".($fitsInMyDiet ? "yes" : "no")."</td></tr>";
            echo "</table>";
        }

        createNutrientChart(25, 10, 15, 5, true);
        createNutrientChart(62, 22, 4, 2, true);
        createNutrientChart(1, 53, 2, 1, false);
    ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>