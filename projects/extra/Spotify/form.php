<?php
    // var_dump($_SERVER['REQUEST_METHOD']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>

    <link rel="stylesheet" href="./spotify.css" type="text/css">
</head>
<body>
    <div id="header">
        <div class=spotifyLogo></div>
        <div class=inLine>
            <div class="button home" type="button"></div>
            <div class="searchBar"></div>
        </div>
        <div class="inLine account">
            <div class="button signup">Sign up</div>
            <div class="button login">Log in</div>
        </div>
    </div>
    <main>
        <div id="sidebar">
            <h2>Your Library</h1>
        </div>
        <?php if($_SERVER['REQUEST_METHOD'] == "POST"): ?>
            <?php 
                $fname = filter_input(INPUT_POST, 'fname');
                $lname = filter_input(INPUT_POST, 'lname');
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);    
                $plan = filter_input(INPUT_POST, 'plan');
                $artists = filter_input(INPUT_POST, 'artists');
                $terms = filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_BOOLEAN);

                $errors = "";
                $errors .= empty($fname) ? "<p>First name is required</p>" : "";
                $errors .= empty($lname) ? "<p>Last name is required</p>" : "";
                $errors .= $email === false ? "<p>Email is required</p>" : "";
                $errors .= empty($plan) ? "<p>Plan is required</p>" : "";
                $errors .= empty($artists) ? "<p>Favorite artists are required</p>" : "";
                $errors .= $terms !== true ? "<p>You need to agree to the terms of conditions</p>" : "";

                $errors .= empty($errors) ? "<p>Form submitted successfully</p>" : "";
            ?>
            <h1>Form submitted</h1>
            <?php echo $errors; ?>
        <?php else: ?>
            <div id="form">
                <h1>Sign up form</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" id="username">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" id="password">
                    
                    <label for="individual">Individual</label>
                    <input type="radio" name=plan value="individual" id="individual">
                    <label for="family">Family</label>
                    <input type="radio" name=plan value="family" id="family">

                    <label for="artists">Favorite artists</label>
                    <input type="textarea" name="artists" id="artists">
                    <label for="terms">I agree to the terms and conditions</label>
                    <input type="checkbox" name="terms" value="true" id="terms">

                    <input type="submit" value="Submit">
                </form>
            </div>
        <?php endif; ?>
    </main>
    <div id=adBanner></div>
</body>
</html>