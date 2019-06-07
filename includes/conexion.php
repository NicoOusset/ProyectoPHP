<?php
    $server= "localhost";
    $usurname="root";
    $password="";
    $database="phpmysql";

    $db= mysqli_connect($server,$usurname,$password,$database);

    mysqli_query($db, "SET NAMES 'utf8'");

    
    if (!isset($_SESSION)) {
        session_start();
    }

?>