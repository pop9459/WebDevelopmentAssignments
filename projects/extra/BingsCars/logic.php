<?php
    $menuTexts = array("Home", "Most hired cars", "Contact");
    $links = array(
        "Home" => "index.php",
        "Most hired cars" => "",
        "Contact" => "contact.php"
    );

    function displayMenu()
    {
        foreach($GLOBALS["menuTexts"] as $menuItem)
        {
            //set link if possible
            $link = "";
            if(isset($GLOBALS["links"][$menuItem]))
            {
                $link = $GLOBALS["links"][$menuItem];
            }

            echo "<a href='".$link."'>".$menuItem."</a>";
        }
    }
?>