<?php
session_start();
//---Registrating---//
//Assume we have done a POST request and all checks are done on the desired username and password ($desired_username & $desired_password)
$desired_username = "testuser";
$desired_password = "qwerty";

//First, we need to check if the user already exists in the database
//We create a connection
$dbHandler = null;
try{
    $dbHandler = new PDO("mysql:host=mysql;dbname=login_demo;charset=utf8", "root", "qwerty");
}catch(Exception $ex){
    echo $ex;
}
//If the connection is succssfull, continue
if($dbHandler){
    try{
        //Build a query
        $stmt = $dbHandler->prepare("SELECT *
                                     FROM `users`
                                     WHERE `username` = :username"
                                );
        //Bind the params and execute
        $stmt->bindParam("username", $desired_username, PDO::PARAM_STR);
        $stmt->execute();     
    }catch(Exception $ex) {
        printError($ex);
    }
}
//If there is a statement, the query was successfull
if(isset($stmt)){
    if($stmt->rowCount() == 0){//If the rowcount is 0, it means that there are no other users with the same username. Thus we can continue. 
        $hashed_password = password_hash($desired_password, PASSWORD_BCRYPT);//We hash the password with the BCRYPT algorithm
        //Now we need to insert the username and the hashed password in the database
        //Try to do it yourself!

    }else{
        echo "The desired username is in use!";
    }

}

//---Logging in---//
//Assume we have done a POST request and all checks are done on the user provided username and password ($input_username & $input_password)
//Also assume we have fetched the password of the user from the database ($hashed_password)
$input_username = "testuser";
$input_password = "qwerty";

$hashed_password =  '$2y$10$uboujuyW8xLUhtjNPFlAX.6oOr8Tl63/QPRGK.TFCxPJtGoHNPuYm'; //this password has wag generated with the "password_hash" function based on the "qwerty" pass

if(password_verify($input_password, $hashed_password)){//If the passwords match, continue. We need to use password_verify here!
    //Passwords match, now we can set the session (do not forget to start the session!)
    $_SESSION["user"] = $input_username; //Now that the session is set, we are "logged in" (session_start is on line 2)
}else{
    echo "Wrong password or username";
}


//---Showing information or pages if a user is logged in---//
//If the user session variable has been set, we can assume that a user has been logged in thus showing the page.
echo "<h1>Admin page</h1>";
if(isset($_SESSION["user"])){ 
    echo "<p>Hello {$_SESSION["user"]}, welcome to the admin page.</p>";
}else{
    echo "<p>You are not permitted to see this page. Please login.</p>";
}

//---Logging out---//
//In order to logout, we need to remove the session. 
if(isset($_SESSION["user"])){ //First, we check if there actually is a user present
    session_destroy();//This will destroy the session cookie, thus removing any traces of the session
    //session_unset();//Warning: While session_unset is usable, it does not remove the session cookie. It only removes the data of the session. Has its uses
}else{
    echo "<p>Cannot logout, you are not logged in!</p>";
}



?>