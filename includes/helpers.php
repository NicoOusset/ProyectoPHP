<?php

    function mostrarError($errores, $campo){

        $alerta='';
        if(isset($errores[$campo]) && !empty($campo)){
           return $alerta = "<div class='alerta alerta_error'>". $errores[$campo]." </div>";

        }


    }

    function borrarErrores(){
       $borrado=false;
       if (isset($_SESSION['errores'])) {
            $_SESSION['errores'] = null;
            $borrado =  true;
        }

        if (isset($_SESSION['error_login'])) {
            $_SESSION['error_login'] = null;
            $borrado =  true;
        }
        if (isset($_SESSION['errores_entrada'])) {
            $_SESSION['errores_entrada'] = null;
            $borrado =  true;
        }   
       if (isset($_SESSION['completado'])) {
            $_SESSION['completado'] = null;
            $borrado =  true;
        }
        
        return $borrado;
    }

    function conseguirCategorias($conexion){
       $sql = "SELECT * FROM categorias ORDER BY id ASC";
       $categorias = mysqli_query($conexion, $sql);
       $result=array(); 
       if ($categorias && mysqli_num_rows($categorias)>=1) {
            $result= $categorias;
        }

        return $result;
    }

    function conseguirCategoria($conexion, $id){
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $categorias = mysqli_query($conexion, $sql);
        $result=array(); 
        if ($categorias && mysqli_num_rows($categorias)>=1) {
             $result= mysqli_fetch_assoc($categorias);
         }
 
         return $result;
     }

    function conseguirUltEntradas($conexion){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id ORDER BY e.id DESC LIMIT 4";

        $entradas = mysqli_query($conexion, $sql);
        $resultado=array(); 
        if ($entradas && mysqli_num_rows($entradas)>=1) {
            $resultado= $entradas;
        }

        return $resultado;

    }
    
    function conseguirTodasEntradas($conexion, $categoria = null){
        $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id=c.id ";

        if(!empty($categoria)){
            $sql .= "WHERE e.categoria_id = $categoria ";
        }

        $sql .= "ORDER BY e.id DESC";

        $entradas = mysqli_query($conexion, $sql);
        $resultado=array(); 
        if ($entradas && mysqli_num_rows($entradas)>=1) {
            $resultado= $entradas;
        }

        return $resultado;

    }


?>