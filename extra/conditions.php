<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conditions</title>
</head>
<body>
    
    <?php
        $color = "red";

        switch ($color) {
            case "blue":
                echo "The color is blue.";
                break;
            case "green":
                echo "The color is green.";
                break;
            default:
                echo "The color is neither blue nor green.";
                break;
        }
    ?>

</body>
</html>