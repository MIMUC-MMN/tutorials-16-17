<?php

// use connectionInfo.php as a template and
// create connectionInfo.private.php to avoid checking your
// credentials into the git repository.
include_once('connectionInfo.private.php');

// $c is then a mysqli object representing the connection to the database.
$c = new mysqli($host,$user,$password,$db);

// note: there is a question mark at the end (wildcard)
$query = "SELECT firstName,lastName FROM people WHERE firstName=?";


// prepare the statement.
// the returned object is a "statement object"
// http://php.net/manual/de/mysqli.prepare.php
$statement = $c->prepare($query);

$name = "Sam";

// the first parameter indicates that $name is a String.
$statement->bind_param("s", $name);

// now, execute the query
$statement->execute();

// the results need to be bound to variables.
// make sure to match the order in the query!
$statement->bind_result($firstName,$lastName);

// fetch the actual values;
while($statement->fetch()){
    echo "$firstName $lastName";
    echo "<br />";
}

