<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <title>Double Quoted Strings</title>
</head>
<body>
<p>
    <?php
    // timezone configuration (might lead to warnings if this is missing)
    date_default_timezone_set('europe/berlin');

    $currentTime = date("d.m.Y, H:i:s", time());
    echo "It's $currentTime";
    ?>
</p>
</body>
</html>