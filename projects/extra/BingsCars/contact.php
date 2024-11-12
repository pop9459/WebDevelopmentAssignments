<?php
    include("logic.php");

    $fName = filter_input(INPUT_POST, "firstName");
    $lName = filter_input(INPUT_POST, "lastName");
    $options = filter_input(INPUT_POST, "options");
    $submitted = filter_input(INPUT_POST, "submit");
    $sucess;

    $result = checkForm();
    if($result === true)
    {
        $sucess = true;
    }

    function checkForm()
    {
        if(empty($GLOBALS["fName"]) || empty($GLOBALS["lName"]) || empty($GLOBALS["options"]))
        {
            return "Please provide all necessary information";
        }
        if(str_word_count($GLOBALS["options"]) < 5)
        {
            return "The options field must contain at least 5 words";
        }
        return true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bing's Cars™</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
    <div id="page">
        <?php include("phpContent/header.php"); ?>
        <?php include("phpContent/hero.php"); ?>
        <main>
            <div class="sectionHeadding">
                <h1>
                    <?php if(isset($sucess))
                        {
                            echo "Thank you";
                        }
                        else
                        {
                            echo "Request a car";   
                        }
                    ?>
                </h1>
                <hr>
            </div>
            <?php if(!$submitted) { ?>
                <form id="contactForm" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <label for="firstName">Firstname</label>
                    <input type="text" id="firstName" name="firstName">
                    <label for="lastName">Last name</label>
                    <input type="text" id="lastName" name="lastName">
                    <div class="inLine">
                        <select name="brand" id="brand">
                            <option value="volkswagen">volkswagen</option>
                        </select>
                        <select name="model" id="model">
                            <option value="hatchback">hatchback</option>
                        </select>
                    </div>
                    <label for="options">Options</label>
                    <input type="textarea" id="options" name="options" placeholder="If you want any extra options, add them here...">
                    <div>
                        <p>Do you want insurance?</p>
                        <div class="inLine">
                            <input type="radio" id="insuranceYes" name="insurance" value="true">
                            <label for="insuranceYes">Yes</label>
                        </div>
                        <div class="inLine">
                            <input type="radio" id="insuranceNo" name="insurance" value="false">
                            <label for="insuranceYes">No</label>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Send request">
                </form>
            <?php }
            else
            {
                if(isset($sucess))
                {
                    echo "summary";
                }
                else
                {
                    echo $result;
                }
            } ?>
                
        </main>
        <?php include("phpContent/footer.php"); ?>
    </div>
</body>
</html>