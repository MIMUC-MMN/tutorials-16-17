<?php

$c = mysqli_connect("localhost", "username", "password");

if ($c) {
    echo "Connection to database has been established.";
} else {
    echo "Could not connect to database";
}


?>
