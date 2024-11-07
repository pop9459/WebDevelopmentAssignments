<?php
    // FORM HANDLING
    $submit = filter_input(INPUT_POST, "submit");
    $name = filter_input(INPUT_POST, "name");
    $address = filter_input(INPUT_POST, "address");
    $city = filter_input(INPUT_POST, "city");
    $region = filter_input(INPUT_POST, "region");
    $email = filter_input(INPUT_POST, "email");
    $gender = filter_input(INPUT_POST, "gender");
    $message = filter_input(INPUT_POST, "message");
    $newsletter = filter_input(INPUT_POST, "newsletter", FILTER_VALIDATE_BOOL);
    
    $formResponse = false;
    $error;

    //check if form has been submited
    if(isset($submit))
    {
        $formResponse = true;
    }
    if(empty($name) || empty($address) || empty($city) || empty($region) || empty($email) || empty($gender) || empty($message))
    {
        $error = "Please provide all necessary information";
    }
    else if(strlen($name) < 6)
    {
        $error = "Your name must contain a minumum of 6 characters";
    } 
    else if(strpos($email, "@") === false || substr($email, -4) !== ".com")
    {
        $error = "Your email must contain an '@' and end in '.com'";
    }

    function printUserInfo()
    {
        ?>
        <div class="userInfo">
            <p><span>Name:</span><?php echo $GLOBALS["name"]; ?></p>
            <p><span>Address:</span><?php echo $GLOBALS["address"]; ?></p>
            <p><span>City:</span><?php echo $GLOBALS["city"]; ?></p>
            <p><span>Region:</span><?php echo $GLOBALS["region"]; ?></p>
            <p><span>E-mail address:</span><?php echo $GLOBALS["email"]; ?></p>
            <p><span>Gender:</span><?php echo $GLOBALS["gender"]; ?></p>
            <p><span>Your massage:</span><?php echo $GLOBALS["message"]; ?></p>
            <p><span>Newsletter:</span><?php 
            if($GLOBALS["newsletter"])
            {
                echo "Yes";
            } 
            else
            {
                echo "No";
            }
            ?></p>
        </div>
        <?php
    }

    // PRODUCTS
    $productImgs = array("MowglisoftPhone.png", "PearBoxBall.png", "D4Box.png", "StrawberryPi.png", "HongWangDrill.png", "TuttiFootyBoots.png");
    $productTexts = array("Mowglisoft JunglePhone ultra", "Boxingball by Pear", "D-Four D-box all in one PC", "Strawberry Pi IOT Platform", "HongWang Drill with case", "Original Tutti Footy Boots");
    $productPrice = array("200,-", "49.95", "899,-", "14.99", "49.55", "39.95");

    function displayFlashDeals()
    {
        for($i = 0; $i < sizeof($GLOBALS["productImgs"]); $i++)
        {
            echo "<div class='productTile'>";
            echo "<img src='resources/".$GLOBALS["productImgs"][$i]."' alt='".$GLOBALS["productImgs"][$i]."'>";
            echo "<h3>".$GLOBALS["productTexts"][$i]."</h3>";
            echo "<h2>".$GLOBALS["productPrice"][$i]."</h2>";
            echo "</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AliExtreme ™</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
    <div id="background">
        <div id="page">
            <?php include_once("phpContent/header.php"); ?>
            <main>
                <h1 class="gridHeader">Categories</h1>
                <?php if($formResponse): ?>
                    <h2 class="gridHeader">Contact form</h2>
                <?php else: ?>
                    <h2 class="gridHeader">Flash deals</h2>
                <?php endif ?>
                <ul>
                    <li><a href="">Women's clothing</a></li>
                    <li><a href="">Mens's clothing</a></li>
                    <li><a href="">Phones & Accessories</a></li>
                    <li><a href="">Computer & Office</a></li>
                    <li><a href="">Consumer Electronics</a></li>
                    <li><a href="">Jewlery & Accessories</a></li>
                    <li><a href="">Home & Garden</a></li>
                    <li><a href="">Shoes</a></li>
                    <li><a href="">Sports and entertainment</a></li>
                </ul>
                <?php if($formResponse): ?>
                    <?php 
                        if(isset($error))
                        {
                            echo "<h3 class='formError'>".$error."</h3>";
                        }
                        else
                        {
                            printUserInfo();
                        }
                        ?>
                <?php else: ?>
                    <div class="flashDeals">
                        <?php displayFlashDeals(); ?> 
                    </div>
                <?php endif ?>
            </main>
            <?php include("phpContent/footer.php");?>
        </div>
    </div>
</body>
</html>