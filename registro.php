<?php
    
    if(isset($_POST)){

        require_once 'includes/conexion.php';
        if(!isset($_SESSION)){    
            session_start();
        }

        //      si existe post [nombre]      se guarda eso   : sino se guarda false;
        $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellidos= isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
        $email= isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
        $password= isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

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

        if(!empty($password)){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password']= "El password no es valido";
        }

        $guardar_usuario=false;

       if (count($errores)==0) {
           //insertamos el usuario en la base de datos

           //cifrar contraseña
            // $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
            //var_dump($password_segura);
            //die();

            $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password', CURDATE())";
            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['completado']="El registro se ha completado con exito";
            }else{
                $_SESSION['errores']['general']="Fallo al guardar el usuario";
            }
           

       }else {
            $_SESSION['errores'] = $errores;
            
       }

    }

    header('Location: index.php');
?>