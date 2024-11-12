<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        //get the form data
        $fname = filter_input(INPUT_POST, 'fName');
        $lname = filter_input(INPUT_POST, 'lName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $areaCode = filter_input(INPUT_POST, 'areaCode');
        $phone = filter_input(INPUT_POST, 'phone');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $addressL2 = filter_input(INPUT_POST, 'addressL2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $website = filter_input(INPUT_POST, 'website');
        $subjects = filter_input(INPUT_POST, 'subjects', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $billing = filter_input(INPUT_POST, 'billing');
        
        $errors = [];
        //check if all fields are filled
        if (empty($fname) || 
            empty($lname) || 
            empty($email) || 
            empty($areaCode) || 
            empty($phone) || 
            empty($company) || 
            empty($address) || 
            empty($city) || 
            empty($state) || 
            empty($zip) || 
            empty($website) || 
            empty($subjects) || 
            empty($billing)) 
        {
            array_push($errors, "All fields are required");
        }

        //check if names are valid
        if(strlen($fname) < 5 || strlen($lname) < 5) 
        {
            array_push($errors, "Name is too short");
        }

        if(strtolower($fname) == $fname || strtolower($lname) == $lname) 
        {
            array_push($errors, "Names must contain at least one uppercase letter");
        }

        //check if email is valid
        if($email === false || 
            explode('.', $email)[1] != "eu"
        )
        {
            array_push($errors, "Email is invalid");
        }
            
        if(empty($addressL2)) $addressL2 = $address;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment form</title>
    <link rel="stylesheet" href="formStyle.css">
</head>
<body>
    <div class=formContainer>
        
        <div id="formOutput">
            <?php
                if(count($errors) > 0) {
                    echo "<div class='errorBox'>";
                    echo "<ul>";
                    foreach($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul>";
                }
                else {
                    echo "<div class='successBox'>";
                    echo "<p>Form submitted successfully</p>";
                }
                echo "</div>";
                ?>
        </div>
        
        <h1>Webinar Subscription</h1>
        <hr>
        
        <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
            <h3>Name</h3>
            <div class="formSection inRow">
                <div class="inColumn">
                    <input type="text" name="fName" id="fName">
                    <label for="fName">First Name</label>
                </div>
                <div class="inColumn">
                    <input type="text" name="lName" id="lName">
                    <label for="lName">Last Name</label>
                </div>
            </div>
            
            <h3>E-mail</h3>
            <div class="formSection inColumn">
                <input type="text" name="email" id="email" value="ex: myname@example.com">
                <label for="email">myname@example.com</label>
            </div>
            
            <h3>Work Phone</h3>
            <div class="formSection inRow">
                <div class="inColumn">
                    <input type="text" name="areaCode" id="areaCode">
                    <label for="areaCode">Area Code</label>
                </div>
                <p>-</p>
                <div class="inColumn">
                    <input type="text" name="phone" id="phone">
                    <label for="phone">Phone Number</label>
                </div>
            </div>
            
            <h3>Company</h3>
            <div class="formSection">
                <input type="text" name="company" id="company">
            </div>

            <h3>Company Address</h3>
            <div class="formSection inColumn">
                <input type="text" name="address" id="address">
                <label for="address">Street Address</label>
                <input type="text" name="addressL2" id="addressL2">
                <label for="addressL2">Street Address Line 2</label>
                <div class="inRow">
                    <div class="inColumn">
                        <input type="text" name="city" id="city">
                        <label for="city">City</label>
                    </div>
                    <div class="inColumn">
                        <input type="text" name="state" id="state">
                        <label for="state">State / Province</label>
                    </div>
                </div>
                <input type="text" name="zip" id="zip">
                <label for="zip">Postal / Zip Code</label>
            </div>

            <h3>Company Website</h3>
            <div class="formSection">
                <input type="text" name="website" id="website">
            </div>
            
            <h3>Subjects</h3>
            <div class="formSection inColumn">
                <div class="inRow">
                    <input type="checkbox" name="subjects[]" id="finance" value="finance">
                    <label for="finance">Finance course</label>
                </div>
                <div class="inRow">
                    <input type="checkbox" name="subjects[]" id="profSkills" value="profSkills">
                    <label for="profSkills">Professional skills course</label>
                </div>
                <div class="inRow">
                    <input type="checkbox" name="subjects[]" id="growthTips" value="growthTips">
                    <label for="growthTips">Growth tips</label>
                </div>
            </div>

            <h3>Billing</h3>
            <div class="formSection inColumn">
                <div class="inRow">
                    <input type="radio" name="billing" value="monthly" id="monthly">
                    <label for="monthly">Monthly</label>
                </div>
                <div class="inRow">
                    <input type="radio" name="billing" value="quarterly" id="quarterly">
                    <label for="quarterly">Quarterly</label>
                </div>
                <div class="inRow">
                    <input type="radio" name="billing" value="annually" id="annually">
                    <label for="annually">Annually</label>
                </div>
            </div>

            <div class="formSection">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>