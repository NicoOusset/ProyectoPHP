<?php
    
    if(isset($_POST)){

        require_once 'includes/conexion.php';

        //      si existe post [nombre]      se guarda eso   : sino se guarda false;
        $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
        $email= isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;

        //array de errores
        $errores = array();

        //validar los datos antes de guardarlos en la base de datos
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre']= "El nombre no es valido";
        }

        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
            $apellidos_validado = true;
        }else{
            $apellido_validado = false;
            $errores['apellidos']= "El apellido no es valido";
        }

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email']= "El email no es valido";
        }

        $guardar_usuario=false;

       if (count($errores)==0) {
           //actualizamos el usuario en la base de datos
            $usuario=$_SESSION['usuario'];

            $sql = "UPDATE usuarios SET nombre= '$nombre' , apellidos ='$apellidos', email = '$email' WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellido'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                $_SESSION['completado']="Tus datos se han actualizado con exito";
            }else{
                $_SESSION['errores']['general']="Fallo al actualizar el usuario";
            }
           

       }else {
            $_SESSION['errores'] = $errores;
            
       }

    }

    header('Location: misDatos.php');
?>