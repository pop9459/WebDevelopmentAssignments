<?php
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $hardwareType = filter_input(INPUT_POST, 'hardwareType');
    $os = filter_input(INPUT_POST, 'os');
    $frequency = filter_input(INPUT_POST, 'frequency');
    $solution = filter_input(INPUT_POST, 'solution');
    $editLink = filter_input(INPUT_POST, 'editLink');

    //Connect with the database 
    $dbHandler = null; //Create an empty variable that will contain the handler
    try{
        $dbHandler = new PDO("mysql:host=mysql;dbname=demoDb;charset=utf8", "root", "qwerty"); //Connect to the database with the provided connectstring
    }catch(Exception $ex){//If something goes wrong, catch the error and print it
        printError($ex);
    }

    //function for printing errors nicely
    function printError(String $err){
        echo "<h1>The following error occured</h1>
            <p>{$err}</p>";
    }

    //Insert somthing into the database
    if($dbHandler){//If the dbHandler is not null, we can continue (Simply put: we are checking if there is a connection)
        try{
            $stmt = $dbHandler->prepare("INSERT INTO `Bug` (`ID`, `PRoductName`, `Version`, `HardwareType`, `OS`, `Frequency`, `Dolution`, `EditLink`) 
                                        VALUES (NULL, :name, :version, :hardwareType, :os, :frequency, :solution, :editLink);"
                                    ); //We prepare a query, this will return a statement
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':version', $version);
            $stmt->bindParam(':hardwareType', $hardwareType);
            $stmt->bindParam(':os', $os);
            $stmt->bindParam(':frequency', $frequency);
            $stmt->bindParam(':solution', $solution);
            $stmt->bindParam(':editLink', $editLink);
            $stmt->execute(); //Execute the statement
            echo "Query executed! {$stmt->rowCount()} row(s) affected<br>";//Get the amount of rows that were affected
            $stmt->closeCursor();//Only needed in special databases, we close the handler
        }catch(Exception $ex){
            printError($ex);
        }
    }
?>

<form method="post" action="addBug.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="version">Version:</label>
    <input type="text" id="version" name="version" required><br>

    <label for="hardwareType">Hardware Type:</label>
    <input type="text" id="hardwareType" name="hardwareType" required><br>

    <label for="os">Operating System:</label>
    <input type="text" id="os" name="os" required><br>

    <label for="frequency">Frequency:</label>
    <input type="text" id="frequency" name="frequency" required><br>

    <label for="solution">Solution:</label>
    <input type="text" id="solution" name="solution" required><br>

    <label for="editLink">Edit Link:</label>
    <input type="text" id="editLink" name="editLink" required><br>

    <input type="submit" value="Submit">
</form>