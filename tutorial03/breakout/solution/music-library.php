<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Library</title>
    <style>
        body,html{
            font-family: 'Helvetica Neue','Helvetica', 'Arial', sans-serif;
            font-size: 20px;
            margin:0;
            padding:0;
            background-color: #333;
            color: white;
        }
        .error{
            color: red;
        }
        .success{
            color: greenyellow;
        }
        .notification{
            color: coral;
        }
        .error,.success, .notification{
            margin: 2em 0;
            border: 2px dotted white;
            padding: 2em;
        }

        #container{
            width: 90%;
            min-width: 700px;
            margin:auto;
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
        }

        table.albums{
            margin: 2em 0;
            width: 100%;
        }

        #formContainer{
            width: 100%;
        }
        label{
            margin-right: 2em;
        }
    </style>
</head>
<body>

<div id="container">



<?php

// this file holds the connection info in $host, $user, $password, $db;
include_once('connectionInfo.private.php');

// the DBHandler takes care of all the direct database interaction.
require_once('DBHandler.php');

$dbHandler = new DBHandler($host,$user,$password,$db);


// now, let's see whether the user has submitted the form
if(isset($_POST['submit'])){
    $dbHandler->sanitizeInput($_POST['artist']);
    $dbHandler->sanitizeInput($_POST['title']);

    if($dbHandler->insertAlbum($_POST['artist'],$_POST['title'])){
        echo '<div class="success">The album was successfully inserted into the database</div>';
    }
    else{
        echo '<div class="error">There was an error inserting the data into the database</div>';
    }
}

?>



<table class="albums">
    <thead>
    <tr>
        <td>ID</td>
        <td>Artist</td>
        <td>Title</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $albums = $dbHandler->fetchAlbums();
    if(count($albums) == 0){
        echo '<tr class="notification"><td colspan="3">There are no albums yet. You can enter the artist and album title below, then click save.</td></tr>';
    }
    else{
        foreach($albums as $album){
            echo "<tr>";
            foreach($album as $info){
                echo "<td>$info</td>";
            }
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>

<div id="formContainer">
    <form method="post">
        <label>
            Album Artist:
            <input type="text" required name="artist"/>
        </label>

        <label>
            Album Title:
            <input type="text" required name="title"/>
        </label>
        <input type="submit" name="submit" value="Add Album" />
    </form>
</div>

</div>
</body>
</html>