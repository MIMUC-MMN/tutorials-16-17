<?php


// Basics part 1:
$c = mysqli_connect("localhost","user","password");

// create a database
$query = "CREATE DATABASE mydb";
mysqli_query($c,$query);

// select a database
mysqli_select_db($c,"mydb");

// create table
$query = "CREATE TABLE People(name CHAR(30))";
mysqli_query($c, $query);

// close the connection
mysqli_close($c);


// Basics part 2
// exemplary queries:

$query = "SELECT name FROM mydb";
$query = "INSERT INTO mydb VALUES ('Waldo')";
$query = "UPDATE mydb SET name='Harry' WHERE name='Waldo'";
$query = "DELETE FROM mydb WHERE name='Harry'";

$results = mysqli_query($c,query);
mysqli_fetch_assoc($results);

while($row = mysqli_fetch_assoc($results)) {
    echo $row['name'];
}