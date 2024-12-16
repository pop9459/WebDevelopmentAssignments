<?php
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

    //Select something from the database
    if($dbHandler){
        try{
            $stmt = $dbHandler->prepare("SELECT *
                                            FROM `Bug`"
                                        );
            $stmt->execute(); //Note: We only execute the statement, the gathering of data is done in thee second segment           
        }catch(Exception $ex) {
            printError($ex);
        }
    }

    //Print the selection by fetchall
    echo "<h1>fetchall</h1>";
    if(isset($stmt)){
        $results = $stmt->fetchall(PDO::FETCH_ASSOC); //Fetch all the results from the statement in an assoc array
        echo "<table>";
        ?>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Version</th>
            <th>HW Type</th>
            <th>OS</th>
            <th>Frequency</th>
            <th>Solution</th>
            <th>Edit Link</th>
        </tr>
        <?php
        foreach($results as $result){//And print them
            echo "<tr>";
            echo "<td>{$result["ID"]}</td>";
            echo "<td>{$result["ProductName"]}</td>";
            echo "<td>{$result["Version"]}</td>";
            echo "<td>{$result["HardwareType"]}</td>";
            echo "<td>{$result["OS"]}</td>";
            echo "<td>{$result["Frequency"]}</td>";
            echo "<td>{$result["Solution"]}</td>";
            echo "<td><a href='edit.php?id={$result["EditLink"]}'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $stmt->closeCursor();
    }
    $dbHandler = null;
?>

<a href="addBug.php">Add Bug</a>