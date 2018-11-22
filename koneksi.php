<?php

    $host       = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "inventori";

    // buat koneksi
    $mysqli     = mysqli_connect($host, $username, $password, $database);

    if(!$mysqli) {
        echo "Failed Connect to Database";
    }

?>