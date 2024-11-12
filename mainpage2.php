<?php
    function getProjects($dir) {
        $result = [];
        $files = scandir($dir);
        $isProjectDir = false;

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            if (substr($file, -4) === '.php')
            {
                $isProjectDir = true;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                $result[$file] = getProjects($path);
            } else {
                $result[] = $file;
            }
        }
        return $result;
    }

    var_dump(getProjects('projects'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainpage v2</title>
</head>
<body>
    <?php
    ?>
</body>
</html>