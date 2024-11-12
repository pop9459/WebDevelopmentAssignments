<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site alert demo</title>
</head>
<body>
    <?php
        function welcomeMessage($customerAge, $gender, $recentlyVisited) 
        {
            $showAgeWarning = $customerAge < 18;
            $showLadiesEvent = $gender == "female";
            if($showAgeWarning && $showLadiesEvent && $recentlyVisited) 
            {
                echo "<p>WARNING!!!</p>";
                return false;
            }
            if($showAgeWarning) 
            {
                echo "<p>You are not old enough to register</p>";
            }
            if($showLadiesEvent) 
            {
                echo "<p>Ladies event invitation</p>";
            }
            if($recentlyVisited) 
            {
                echo "<p>A discount coupon has been applied</p>";
            }
        }

        welcomeMessage(17, "male", true);
    ?>

    <hr>
    <a href="../../mainpage.php">go to mainpage</a>
</body>
</html>