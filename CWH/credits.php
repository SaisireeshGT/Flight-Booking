<?php
    $host="localhost";
    $dbname="fly";
    $username="root";
    $password= "";

    $mysqli = new mysqli($host, $username, $password, $dbname); 
    if ($mysqli->connect_error) {
        die("CONNECTION_ERROR". $mysqli->connect_error);
    }
    return $mysqli;