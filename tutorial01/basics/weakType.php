<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Weak Types</title>
</head>
<body>
<p>
    <?php

    // 1:
    echo 1 + "10 little pigs";


    // 2:
    $test = 2 . "10 little pigs";
    echo $test;

    // 3:
    echo 3 , "10 little pigs";

    ?>
</p>
</body>
</html>