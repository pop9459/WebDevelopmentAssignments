<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparator</title>
</head>

<body>
    <form method="get">
        <label for="number">Enter a number:</label>
        <input type="number" name="numberToCompare">
        <input type="submit" value="Submit">
    </form>

    <?php
        function compareTo100($inputNum) 
        {
            if($inputNum < 100) 
            {
                return 0;
            }
            elseif($inputNum > 100) 
            {
                return 2;
            }
            else 
            {
                return 1;
            }
        }
        
        if(isset($_GET['numberToCompare'])) {  
            switch(compareTo100($_GET['numberToCompare'])) {
                case 0:
                    echo "<p>The number is less than 100.</p>";
                    break;
                case 1:
                    echo "<p>The number is equal to 100.</p>";
                    break;
                case 2:
                    echo "<p>The number is greater than 100.</p>";
                    break;
                default:
                    echo "<p>An error occurred while comparing the number.</p>";
                    break;
            }
        }  
    ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>

</html>