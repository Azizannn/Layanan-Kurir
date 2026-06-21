<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $namaDB = "dbkurir";

    $mysqli = new mysqli($host, $username, $password, $namaDB);
    //check connection
    if ($mysqli->connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }else{
        // echo "berhasil konek";
    }
?>