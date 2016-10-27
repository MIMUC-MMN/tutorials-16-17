<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Session Example: Count</title>
</head>
<body>

<?php

if(isset($_POST['destroy'])) {
    session_destroy();
    $_SESSION = array();
}

if(!isset($_SESSION['count'])){
    $_SESSION['count'] = 1;
}
else{
    $_SESSION['count']++;
}

echo '<p>Current count: '.$_SESSION['count'].'</p>';

// uncomment the next line to see which session variables are there.
// print_r($_SESSION);

?>
<form method="post">
    <input type="submit" name="destroy" value="Reset"/>
</form>
</body>
</html>