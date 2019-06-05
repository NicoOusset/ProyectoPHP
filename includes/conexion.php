<?php
    $server= "localhost";
    $usurname="root";
    $password="";
    $database="phpmysql";

    $db= mysqli_connect($server,$usurname,$password,$database);

    mysqli_query($db, "SET NAMES 'utf8'");

    //iniciar la sesion
    session_start();


?>