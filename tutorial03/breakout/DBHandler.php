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

        //TODO create the database connection.
        //TODO make sure the table 'albums' exists.
    }

    /**
     * creates a database record for the given artist and title.
     * @param $artistName String name of te album's artist
     * @param $albumTitle String title of the album
     * @return bool true for success, false for error
     */
    function insertAlbum($artistName,$albumTitle){
        if($this->connection){
            // TODO insert the album via mysqli
        }
        return false;
    }

    /**
     * makes sure that the albums table is present in the database
     * before any interaction occurs with it.
     */
    function ensureAlbumsTable(){
        if($this->connection){
            // TODO create table if it doesn't exist.
        }
    }

    /**
     * @return array of rows (id, artist, title)
     */
    function fetchAlbums(){
        $albums = array();
        // TODO fetch all albums and put them into the $albums array.
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