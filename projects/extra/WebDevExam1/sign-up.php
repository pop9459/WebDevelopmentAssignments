<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AliExtreme ™</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/signUp.css" type="text/css">
</head>
<body>
    <div id="background">
        <div id="page">
            <?php include_once("phpContent/header.php"); ?>
            <main class="signUpMain">
                <h1 class="gridHeader mainHeader">SIGN-UP</h1>
                <form action="index.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">

                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">

                    <label for="city">City</label>
                    <input type="text" name="city" id="city">

                    <label for="region">Region</label>
                    <select name="region" id="region">
                        <option value="Africa">Africa</option> 
                        <option value="Antarctica">Antarctica</option> 
                        <option value="America">America</option> 
                        <option value="Asia">Asia</option> 
                        <option value="Europe" selected>Europe</option> 
                        <option value="Oceania">Oceania</option> 
                    </select>

                    <label for="email">E-mail address</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="">Gender</label>
                    <div class="inLine">
                        <input type="radio" name="gender" id="male" value="male" checked>
                        <label for="male">Male</label>
                        
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>
                    </div>
                    
                    <label for="message">Your message</label>
                    <input type="textArea" name="message" id="message">

                    <label for="newsletter">Newsletter?</label>
                    <input type="checkbox" name="newsletter" id="newsletter">

                    <div class="fullWidth inLine">
                        <input type="submit" name="submit" value="Send form">
                        <input type="reset">
                    </div>
                </form>
                <img src="resources/JoinUs.png" alt="joinUsImage">
            </main>
            <?php include("phpContent/footer.php");?>
        </div>
    </div>
</body>
</html>