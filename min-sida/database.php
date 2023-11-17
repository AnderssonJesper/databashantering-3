<?php

function getConnection(){
    $host = "localhost";
    $port = 3306;
    $database = "test";
    $username = "root";
    $password = "";

    $connection = new mysqli($host, $username, $password, $database, $port);

    if($connection-> connect_error != null){
        die("Anslutningen misslyckades:". $connection->connect_error);
    }else{
        echo "Anslutningen lyckades";
        return $connection;
    }
}