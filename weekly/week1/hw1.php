<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Van Winteren</title>
    <link rel="stylesheet" href="hw1.css" type="text/css">
</head>
<body>
    <?php
        function assignClass($inputStr, $class) {
            return "<span class=$class>".$inputStr."</span>";
        }

        $firstName = assignClass("Van", "name");
        $secondName = assignClass("Winteren", "name");
        $horseName = assignClass("Bensley", "name");
        
        $age = assignClass(33, "number");
        $collectorForYears = assignClass(4, "number");
        $numCars = assignClass(33, "number");
        $numHorses = assignClass(37, "number");
        $numInstruments = assignClass(29, "number");
        $guitarAge = assignClass(123, "number");
        $horseAge  = assignClass(8, "number");

        print("<p>");
        print("Mr. $firstName $secondName, $age years old, has been collecting special objects for the past $collectorForYears years. $firstName $secondName currently has $numCars <u>cars</u>, $numHorses <u>horses</u> and $numInstruments <u>rare musical instruments</u>. The rarest instrument in $firstName $secondName's possession is a $guitarAge-year-old <u>guitar</u>. His favorite <u>horse</u> is $horseName, the $horseAge year old stallion.");
        print("</p>");
    ?>
    
    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>