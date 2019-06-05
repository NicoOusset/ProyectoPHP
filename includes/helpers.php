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
            $borrado =  session_unset($_SESSION['errores']);
       }
       if (isset($_SESSION['completado'])) {
            $_SESSION['completado'] = null;
            session_unset($_SESSION['completado']);
        }
        
        return $borrado;
    }



?>