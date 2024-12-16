<?php

require_once("./inc/dbconnect_inc.php");

// Function to hash the password with BCRYPT
function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to verify the password against the hashed value
function verifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}

//create code
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <title>Administrator Registration</title>
</head>

<body>

    <div id="container">
        <header>
            <h1>Administrator Registration</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.php">Manager Products</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>

        <div id="registrationForm">
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="repeatPassword">Repeat Password:</label>
                <input type="password" id="repeatPassword" name="repeatPassword" required>
                <input type="submit" value="Register">
            </form>
        </div>

    </div>

</body>

</html>