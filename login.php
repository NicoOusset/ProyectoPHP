<?php
    //iniciar secion y la conexion a la base de datos
    require_once 'includes/conexion.php';

    //recoger datos del formularios
    if (isset($_POST)) {

        //borrar error antiguo
        if (isset($_SESSION['error_login'])) {
            session_unset($_SESSION['error_login'] = "Login incorrecto");
        }

        //recoger datos del formulario
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($db, $sql);

        //consultar la autenticidad de los datos
        if($login && mysqli_num_rows($login)==1){
            $usuario = mysqli_fetch_assoc($login);
          //  var_dump($usuario);
          //  die();


          //comprobar la contraseña
            $pass_correcta =false;
            if ($password== $usuario['password']) {
                echo "contraseña ok";
                $pass_correcta= true;
            }

            //utilizar una sesion para guardar los datos
            if($pass_correcta){
                $_SESSION['usuario'] = $usuario;       

            }else {
                //si algo falla enviar una sesion con el fallo
                $_SESSION['error_login'] = "Login incorrecto";
            }    
        }else {
            $_SESSION['error_login'] = "Login incorrecto";
        }

       

    }
    //redirigir a index
    header("Location: index.php");

?>