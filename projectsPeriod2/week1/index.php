<?php
    $distances = array(
        "Berlin" => array(
            "Berlin" => 0,
            "Moscow" => 1607.99,
            "Paris" => 876.96,
            "Prague" => 280.34,
            "Rome" => 1181.67
        ),
        "Moscow" => array(
            "Berlin" => 1607.99,
            "Moscow" => 0,
            "Paris" => 2484.92,
            "Prague" => 1664.04,
            "Rome" => 2374.26
        ),
        "Paris" => array(
            "Berlin" => 876.96,
            "Moscow" => 641.31,
            "Paris" => 0,
            "Prague" => 885.38,
            "Rome" => 1105.76
        ),
        "Prague" => array(
            "Berlin" => 280.34,
            "Moscow" => 1664.04,
            "Paris" => 885.38,
            "Prague" => 0,
            "Rome" => 922
        ),
        "Rome" => array(
            "Berlin" => 1181.67,
            "Moscow" => 2374.26,
            "Paris" => 1105.76,
            "Prague" => 922,
            "Rome" => 0
        )
    ); 

    $city1 = filter_input(INPUT_POST, "city1");
    $city2 = filter_input(INPUT_POST, "city2");

    if(!empty($city1) && !empty($city2))
    {
        echo "Distance between $city1 and $city2 is " . getDistance($city1, $city2) . " km";
    }

    function getDistance($city1, $city2)
    {
        global $distances;
        return $distances[$city1][$city2];
    }

    function printCitySelector($varName)
    {
        echo "<select name='$varName'>";
        foreach($GLOBALS["distances"] as $city => $distances)
        {
            echo "<option value='$city'>$city</option>";
        }
        echo "</select>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week1P2</title>
</head>
<body>
    <!-- ASSIGNMENT 1 -->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <?php printCitySelector("city1"); ?>
        <?php printCitySelector("city2"); ?>
        <input type="submit">
    </form>

    <hr>
    <!-- ASSIGNMENT 2 -->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="text" name="name" id="name">
    </form>
</body>
</html>