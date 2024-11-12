<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeChart</title>
</head>
<body>
    <?php
        /*
        Digit - Export  
        < 1  "Invalid figure"  
        1, 2, 3  "Very bad"  
        4, 5  "Insufficient"  
        6, 7  "Sufficient"  
        8  "Good"  
        9  "Very good"  
        10  "Excellent"  
        > 10  "Invalid figure"   
        */
        $grade=7;

        echo "using if statement <br>";

        if($grade<1||$grade>10) {
            echo "Invalid figure";
        }
        elseif($grade<=3) {
            echo "very bad";
        }
        elseif($grade<=5) {
            echo "Insufficient";
        }
        elseif($grade<=7) {
            echo "Sufficient";    
        }
        elseif($grade==8) {
            echo "Good";
        }
        elseif($grade==9) {
            echo "Very good";
        }
        elseif($grade==10) {
            echo "Excellent";
        }

        echo "<br> Using switch statement <br>";

        switch($grade) {
            case 1:
            case 2:
            case 3:
                echo "Very bad";
                break;
            case 4:
            case 5:
                echo "Insufficient";
                break;
            case 6:
            case 7:
                echo "Sufficient";
                break;
            case 8:
                echo "Good";
                break;
            case 9:
                echo "Very good";
                break;
            case 10:
                echo "Excellent";
                break;
            default:
                echo "Invalid figure";
                break;
        }
    ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>