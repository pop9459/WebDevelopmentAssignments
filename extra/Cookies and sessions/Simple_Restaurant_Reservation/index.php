<?php
session_start();

$page = 1;
if (isset($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($page == 2) {
        $_SESSION['amountOfPeople'] = filter_input(INPUT_POST, 'amountOfPeople');
    }
    
    if ($page == 3) {
        $_SESSION['allergies'] = filter_input(INPUT_POST, 'allergies', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    }
    
    if ($page == 4) {
        $_SESSION['type'] = filter_input(INPUT_POST, 'type');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reservation</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Restaurant Reservation</h1>
        <?php if ($page == 1): ?>
        <form method="post" action="?page=2">
            <div class="form-group">
                <label>With how many people?</label>
                <input type="number" name="amountOfPeople">
            </div>
            <div>
                <input type="hidden" name="page" value="2">
                <input type="submit" value="Next">
            </div>
        </form>
        <?php endif; ?>
        <?php if ($page == 2): ?>
        <form method="post" action="?page=3">
            <div class="form-group">
                <p>You will bring <?php echo $_SESSION['amountOfPeople']; ?> guests</p>
                <label>What are the allergies?</label>
                <?php
                for ($i = 0; $i < $_SESSION['amountOfPeople']; $i++) {
                    echo 'Person '. ($i + 1) . ' <input type="text" name="allergies[]"><br>';
                }
                ?>
            </div>
            <div>
                <input type="hidden" name="page" value="3">
                <input type="submit" value="Next">
            </div>
        </form>
        <?php endif; ?>
        <?php if ($page == 3): ?>
        <form method="post" action="?page=4">
            What do you want?
            <div>
                <input type="radio" name="type" value="Breakfast" checked> Breakfast
                <input type="radio" name="type" value="Lunch"> Lunch
                <input type="radio" name="type" value="Dinner"> Dinner
            </div>
            <div>
                <input type="hidden" name="page" value="4">
                <input type="submit" value="Next">
            </div>
        </form>
        <?php endif; ?>
        <?php if ($page == 4): ?>
        <h2>Summary</h2>
        <p>Amount of guests: <strong><?php echo $_SESSION['amountOfPeople']; ?></strong></p>
        <p>Allergies</p>
        <ul>
            <?php 
            foreach ($_SESSION['allergies'] as $allergy) {
                echo '<li>'. $allergy . '</li>';
            }
            ?>
        </ul>
        <p>Type: <strong><?php echo $_SESSION['type']; ?><strong</p>
        <?php endif; ?>
    </body>
</html>