<?php


/*
 * Usually, localhost works, but
 * sometimes you need to put "127.0.0.1" instead.
 * This depends on the user you'll use later.
 * In phpMyAdmin, you can set the privileges for the user.
 * You should !not! use the root user in a real-world setting.
 */
$host = "localhost";

/*
 * the user. If you're running MySQL with the
 * default configuration, you will need to create another
 * user first (so you can avoid using 'root').
 * There is some information here: http://www.liquidweb.com/kb/create-a-mysql-user-on-linux-via-command-line/
 */
$user = '<INSERT_USER_HERE>';

/*
 * writing passwords into script is not the best idea
 * but for the exercises this isn't too bad.
 * UNLESS: You push it to GitHub.
 * That's something you don't want to do.
 */
$password = "<INSERT_DB_PASSWORD_HERE>";

// now, let's connect using the variables set above.
$c = mysqli_connect($host, $user, $password);

/*
 * since mysql does not know yet, which database we want to work with,
 * we need to select it here.
 * The mysqli interface also support specifying the database with the mysqli_connect call directly.
 * This is for demonstration purposes:
 */
mysqli_select_db($c,"mydb");

// formulate a query.
$query = "SELECT * FROM mytable";

/*
 * actually query the database.
 * Since this is an example for the procedural approach,
 * we need to pass the database connection object as a parameter,
 * so mysqli knows which connection to work on.
 * you can imagine having more than one connection!
 */
$results = mysqli_query($c, $query);

/*
 * now fetch one row from the results in different ways
 */
// only index-based
mysqli_fetch_array($results);
// should lead to the same result as the first mysqli_fetch_array
mysqli_fetch_array($results, MYSQLI_NUM);
// this is a little more convenient, because this will return an associative array.
mysqli_fetch_array($results, MYSQLI_ASSOC);

/*
 * if you are sure that you won't need the
 * connection anymore, it is recommendable
 * to close it right away.
 * This frees up memory that the server
 * can use for something else (many other clients)
 */
mysqli_close($c);