<?php


// there are fewer comments in this file, because it is mostly an
// adjustment of mysqli_procedural.php
// please read the comments in there.


$host = "localhost";

$user = '<INSERT_USER_HERE>';

$password = "<INSERT_DB_PASSWORD_HERE>";

$database = "myDB";
// $c is then a mysqli object representing the connection to the database.
$c = new mysqli($host,$user,$password,$database);

$query = "SELECT * FROM mytable";

/*
 * rather than passing $c as a parameter, we now can call
 * its query method passing the SQL query as a parameter.
 */
$results = $c->query($query);


$results->fetch_assoc();
$results->fetch_row();

/*
 * if you want to fetch all results at once
 * (not recommended for larger result sets)
 * you can do this with fetch_all
 * the result is a two dimensional array.
 */
$results->fetch_all(MYSQLI_BOTH);
$results->fetch_all(MYSQLI_ASSOC);
$results->fetch_all(MYSQLI_NUM);

$c->close();