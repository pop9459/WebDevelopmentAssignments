<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $left = 5;
        $right = 7;

        echo "<p>before switch: left=$left right=$right</p>";
    
        $right = $left+$right;
        $left = $right-$left;
        $right = $right-$left;

        echo "<p>before switch: left=$left right=$right</p>";
    ?>
    
    <hr>
    <p>solution: </p>
    <ol>
        <li>$right = $left+$right;</li>
        <li>$left = $right-$left;</li>
        <li>$right = $right-$left;</li>
    </ol>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>