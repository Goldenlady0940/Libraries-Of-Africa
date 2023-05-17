<?php

    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $db = 'library';
    $con =  mysqli_connect($host, $user, $pw, $db);
        if (!$con) {
            die('There is a connection error: ' . mysqli_connect_error());
        }

?>