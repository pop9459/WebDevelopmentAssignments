<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data manipulation</title>
</head>
<body>
    <?php
        $date=14012016;

        $year=$date%10000;
        $month=intval(($date%1000000)/10000);
        $day=intval($date/1000000);

        echo "Day: $day<br> Month: $month<br> Year: $year<br> Date in DD-MM-YYYY format: ".sprintf("%02d-%02d-%04d", $day, $month, $year);
    ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>