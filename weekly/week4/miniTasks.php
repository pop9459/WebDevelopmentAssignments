<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini tasks</title>
</head>

<body>
    <?php
    function randomColor()
    {
        $colorWheel = array("red", "orange", "yellow", "green", "blue", "violet");
        $randomIndex = rand(0, count($colorWheel) - 1);
        return $colorWheel[$randomIndex];
    }

    function randomColor2()
    {
        $colorWheel = array("red", "orange", "red", "orange", "yellow", "green", "blue", "violet");
        $randomIndex = rand(0, count($colorWheel) - 1);
        return $colorWheel[$randomIndex];
    }

    $previousColor;
    function randomColorAdvanced()
    {
        $colorWheelAdvanced = array("red", "orange", "yellow", "green", "blue", "violet");
        $colorWheelWeights = array(2, 2, 2, 2, 2, 2);

        if (isset($GLOBALS["previousColor"])) {
            $colorWheelWeights[array_search($GLOBALS['previousColor'], $colorWheelAdvanced)] /= 2;
        }

        $totalWeights = array_sum($colorWheelWeights);

        $randomIndex = rand(1, $totalWeights);
        $chosenColorIndex = 0;
        $nextColorTotalIndex = $colorWheelWeights[$chosenColorIndex];

        while ($randomIndex > $nextColorTotalIndex) {
            $chosenColorIndex++;
            $nextColorTotalIndex += $colorWheelWeights[$chosenColorIndex];
        }
        $GLOBALS['previousColor'] = $colorWheelAdvanced[$chosenColorIndex];

        return $colorWheelAdvanced[$chosenColorIndex];
    }
    ?>

    <h1>Task 1a</h1>
    <h2 style="color: <?php echo randomColor(); ?>">my color is random</h2>
    <h1>Task 1b</h1>
    <h2 style="color: <?php echo randomColor2(); ?>">my color is random</h2>
    <h1>Task 1c</h1>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>
    <h2 style="color: <?php echo randomColorAdvanced(); ?>">my color is random</h2>

    <?php
    function getHighestAreaCode($array)
    {
        $highest = 0;
        foreach ($array as $num) {
            if ($num > $highest) {
                $highest = $num;
            }
        }
        return $highest;
    }

    function containsNum($array, $num)
    {
        foreach ($array as $arrayNum) {
            if ($arrayNum == $num) {
                return "Success the $num is in the array";
            }
        }
        return "Failure the $num is not in the array";
    }

    function containsNumbers($searchingInNums, $searchingForNums)
    {
        $numsFound = array();
        $numsNotFound = array();
        foreach ($searchingForNums as $searchingFor) {
            if (in_array($searchingFor, $searchingInNums) !== false) {
                array_push($numsFound, $searchingFor);
            } else {
                array_push($numsNotFound, $searchingFor);
            }
        }
        echo "<h3>Nums found: </h3>";
        echo "<p>";
        foreach ($numsFound as $num) {
            echo "$num ";
        }
        echo "</p>";

        echo "<h3>Nums not found: </h3>";
        echo "<p>";
        foreach ($numsNotFound as $num) {
            echo "$num ";
        }
        echo "</p>";
    }

    $areaCodes = array(26, 14, 12, 58, 34, 66, 7, 41);
    ?>
    <hr>
    <h1>Area codes</h1>
    <h2><?php foreach ($areaCodes as $code) {
            echo "$code ";
        } ?></h2>
    <h1>Task 2a</h1>
    <h2>The area code with the highest number is: <?php echo getHighestAreaCode($areaCodes); ?></h2>
    <h1>Task 2b</h1>
    <h2>Looking for number 12: <?php echo containsNum($areaCodes, 12); ?></h2>
    <h2>Looking for number 9: <?php echo containsNum($areaCodes, 9); ?></h2>
    <h1>Task 2c</h1>
    <h2>Looking for numbers 9, 26, 14, 2</h2>
    <?php containsNumbers($areaCodes, array(9, 26, 14, 2)); ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>

</html>