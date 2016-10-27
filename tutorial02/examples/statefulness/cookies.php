<?php

setcookie("MMNCookie","Hello statefulness!");


?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>

<?php
    /*
    you shouldn't do this here
    cookies are part of the HTTP header and therefore need
    to be set before any output occurs.
    However, it seems that some php interpreters are less
    restrictive here, because belated setcookie() calls still succeed.
    */
    //setcookie("Dont","Do_This_Here");

    // this only works after refreshing the page at least once!
    var_dump($_COOKIE['MMNCookie']);
    var_dump($_COOKIE['Dont']);

?>
</body>
</html>