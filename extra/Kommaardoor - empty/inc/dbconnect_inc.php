<?php

$dbHandler = null; //Create an empty variable that will contain the handler

$host = "mysql";
$dbname = "kommaardoor";
$user = "root";
$pass = "qwerty";

try{
    $dbHandler = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass); //Connect to the database with the provided connectstring
} catch(Exception $ex){ //If something goes wrong, catch the error and print it
    echo($ex);
}

?>