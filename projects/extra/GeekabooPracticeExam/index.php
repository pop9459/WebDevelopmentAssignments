<?php
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, "password");
    $userType = filter_input(INPUT_POST, "userType");
    
    $browserType = array("ff", "ie", "opera", "safari", "netscape");

    $error = "";
    $currentUser = "";

    //validation
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($email) || empty($password) || empty($userType)) $error = "Please fill in all fields";
        elseif($email === false) $error = "Invalid email address";
        elseif(checkCredentials() === false) $error = "The password given is not correct";
        else{
            $currentUser = explode("@", $email)[0];
        }
    }
    
    function checkCredentials()
    {
        switch($GLOBALS['userType'])
        {
            case "user":
                return $GLOBALS['email'] == "user@user.com" && $GLOBALS['password'] == "user";
                break;
            case "admin":
                return $GLOBALS['email'] == "admin@admin.com" && $GLOBALS['password'] == "admin";
                break;
            default:
                return false;
        }
    }

    function printError()
    {
        if(empty($GLOBALS['error'])) return;
        echo "<p class='error'>";
        echo $GLOBALS['error'];
        echo "</p>";
    }

    function formatUsername($username)
    {
        return strrev(ucfirst(strrev(ucfirst($username))));
    }

    function printBrowsers($browsers) 
    {
        foreach($browsers as $browser) 
        {
            echo "<img src='Resources/".$browser.".png' alt='".$browser."'>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geekaboo | Web Development</title>

    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/geekaboo.css" type="text/css">
</head>

<body>
    <div id="pageContainer">
        <div id=header>
            <img src="Resources/logo_geekaboo.png" alt="header logo">
        </div>
        <div id="navbar">
            <a href="index.php">homepage</a>
            <a>register</a>
            <a>contact</a>
            <?php 
                if(!empty($currentUser))
                {
                    echo '<a href="index.php">';
                    echo 'logout '.$currentUser;
                    echo '</a>';
                }
            ?>
        </div>
        <div id=contentContainer>
            <div id="login" class="contentColumn"> 
                <?php if(empty($currentUser)): ?>
                    <?php printError(); ?>
                    <h1>Login</h1>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <div>
                            <label for="email">Email address:</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div>
                            <input type="submit" value="login">
                        </div>
                        <div>
                            <input type="radio" name="userType" id="user" value="user">
                            <label for="user">User</label>
                            <input type="radio" name="userType" id="admin" value="admin">
                            <label for="admin">Admin</label>
                        </div>
                    </form>
                    <div>
                        <a href="">Forgot password?</a>
                    </div>
                    <div>
                        <a href="">Register</a>
                    </div>
                <?php else: ?>
                    <h1>Welcome <?php echo formatUsername($currentUser); ?></h1>
                <?php endif; ?>
            </div>
            <div id="browsers" class="contentColumn">
                <h1>Browsers</h1>      
                <p>We create websites for:</p>    
                <div id=browserDisplay>
                    <?php printBrowsers($browserType); ?>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,</p>
            </div>
            <div id="welcome" class="contentColumn">
                <h1>Welcome at Geekaboo</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</p>
            </div>
        </div>
        <div id=footer>
            <div class="footerInfo">
                <div>
                    <h3>Info about Geekaboo</h3>
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                </div>
                <div>
                    <h3>Service at Geekaboo</h3>
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                </div>
                <div>
                    <h3>More from Geekaboo</h3>
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                </div>
                <div>
                    <h3>Warranty at Geekaboo</h3>
                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                </div>
            </div>
            <p>&copy; Geekaboo 2023</p>
        </div>
    </div>
</body>

</html>