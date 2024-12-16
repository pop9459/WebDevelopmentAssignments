<?php
    $dbHandler = new PDO('mysql:host=localhost;dbname=demoDB', 'root', 'qwerty');
    $stmt = $dbHandler->prepare('SELECT * FROM users');
    var_dump($stmt);
?>