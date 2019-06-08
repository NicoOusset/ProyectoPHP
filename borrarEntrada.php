<?php
    require_once 'includes/conexion.php';

    if (isset($_SESSION['usuario']) && isset($_GET['id'])) {
       $entradaId = $_GET['id']; 
       $usuarioId = $_SESSION['usuario']['id'];
       
       $sql = "DELETE FROM entradas WHERE usuario_id = $usuarioId AND id = $entradaId ";

        var_dump($sql);

        if(mysqli_query($db, $sql)){
            echo "borrada";
        }else {
            echo "no se borro";  
        }

    }

    header('Location: index.php');

?>