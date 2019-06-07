<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';

    $titulo= isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion= isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria= isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //array de errores
    $errores = array();

    //validar los datos antes de guardarlos en la base de datos
    if(!empty($titulo) ){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['titulo']= "El titulo no es valido";
    }

    if(!empty($descripcion) ){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['descripcion']= "El descripcion no es valido";
    }

    if(!empty($categoria) && is_numeric($categoria) ){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['categoria']= "La categoria no es valida";
    }

   
    if(count($errores)==0){
        $sql = "INSERT INTO entradas VALUES (null, '$usuario', $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql); 
       
        header("Location: index.php");

    }else {
        $_SESSION['errores_entrada']= $errores;
        header("Location: crearEntradas.php");
    }

}

?>