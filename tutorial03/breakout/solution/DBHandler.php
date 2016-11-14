<?php

class DBHandler
{
    const TABLE_ALBUMS = 'albums';
    var $connection;

    /**
     * @param $host String host to connect to.
     * @param $user String username to use with the connection. Make sure to grant all necessary privileges.
     * @param $password String password belonging to the username.
     * @param $db String name of the database.
     */
    function __construct($host,$user,$password,$db){
        $this->connection = new mysqli($host,$user,$password,$db);
        $this->connection->set_charset('utf8'); // prevent charset errors.
        $this->ensureAlbumsTable();
    }

    /**
     * creates a database record for the given artist and title.
     * @param $artistName name of te album's artist
     * @param $albumTitle title of the album
     * @return bool true for success, false for error
     */
    function insertAlbum($artistName,$albumTitle){
        if($this->connection){
            // because the artist name and album title come from user input, we better user prepared statements.
            $queryString = "INSERT INTO albums (artist,title) VALUES (?,?)";

            $statement = $this->connection->prepare($queryString);
            $statement->bind_param("ss",$artistName,$albumTitle);
            $statement->execute();
            if($statement->error){
                return false;
            }
            else{
                return true;
            }
        }
        return false;
    }

    /**
     * makes sure that the albums table is present in the database
     * before any interaction occurs with it.
     */
    function ensureAlbumsTable(){
        if($this->connection){
            $queryString = "CREATE TABLE IF NOT EXISTS albums (id INT(5) PRIMARY KEY AUTO_INCREMENT, artist VARCHAR(100) NOT NULL, title VARCHAR(255) NOT NULL)";
            // it's okay not to use prepared statements here
            // because it is quite a static thing to do and does not take potentially harmful user input.
            $this->connection->query($queryString);
        }
    }

    /**
     * @return array of rows (id, artist, title)
     */
    function fetchAlbums(){
        $albums = array();
        if($this->connection){
            $queryString = "SELECT id,artist,title FROM albums";

            $statement = $this->connection->prepare($queryString);
            $statement->execute();
            $statement->bind_result($id,$artist,$title);

            while($statement->fetch()){
                $albums[] = array($id,$artist,$title);
            }
        }
        return $albums;
    }

    /**
     * useful to sanitize data before trying to insert it into the database.
     * @param $string String to be escaped from malicious SQL statements
     */
    function sanitizeInput(&$string){
        $string = $this->connection->real_escape_string($string);
    }
}