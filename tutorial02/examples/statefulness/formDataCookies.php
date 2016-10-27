<?php
if(isset($_POST['name'])){
    setcookie('Name',$_POST['name']);
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Name Cookie</title>
</head>
<body>
<?php
// this will not work right after submitting the form
// because the cookie need so sent back to the server
// to become visible to the $_COOKIE superglobal.
if(isset($_COOKIE['Name'])){
    echo '<h1>Hello '.$_COOKIE['Name'].'</h1>';
}
?>

<form method="post">
    <label>Name:
        <input type="text" name="name"/>
    </label>
    <input type="submit" />
</form>
</body>
</html>