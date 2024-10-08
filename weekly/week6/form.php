<?php
    $fname = filter_input(INPUT_POST, "fname");
    $lname = filter_input(INPUT_POST, "lname");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);    

    $options = filter_input(INPUT_POST, "option", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $billing = filter_input(INPUT_POST, "billing");
    $insurance = filter_input(INPUT_POST, "abroad");
    
    echo $billing;
    echo $insurance;
    var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./formy.css" type="text/css">
</head>
<body>
    <div id="container">
        <h1>Health Insurance</h1>
        <hr>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname">
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">

            <p class="nomargin">Additional options:</p>
            <div>
                <label for="physio">Physio</label>
                <input type="checkbox" name="option[]" id="physio" value="physio">
                <label for="dental">Dental</label>
                <input type="checkbox" name="option[]" id="dental" value="dental">
                <label for="crystal">Healing Crystals</label>
                <input type="checkbox" name="option[]" id="crystal" value="crystal">
                <label for="tarot">Tarot Reading</label>
                <input type="checkbox" name="option[]" id="tarot" value="tarot">
            </div>

            <label for="billing">Billing:</label>
            <select name="billing" id="billing">
            <option value="email">Email</option>
            <option value="fax">Fax</option>
            <option value="pigeon">Carrier pigeon</option>
            </select>

            <p class="nomargin">Insurance abroad?</p>
            <div class="flexradio">
            <span>
                <input type="radio" name="abroad" id="y" value="yes">
                <label for="y">Yes</label>
            </span>
            <span>
                <input type="radio" name="abroad" id="n" value="no">
                <label for="n">No</label>
            </span>
            <span>
                <input type="radio" name="abroad" id="m" value="maybe">
                <label for="m">Maybe</label>
            </span>
            </div>

            <div>
            <input type="submit" value="Send Info">
            <input type="reset" value="Reset Form">
            </div>
        </form>
    </div>
</body>
</html>