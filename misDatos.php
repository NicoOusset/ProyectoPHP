<?php require_once 'includes/redireccion.php'; ?>

<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
   
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">

    <h1>Mis datos</h1>

    <form action="actualizarUsuario.php" method="POST">
        <label for="nombre">Nombre</label>  
        <input type="nombre" name="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>"> 
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label for="apellidos">Apellidos</label>  
        <input type="apellidos" name="apellidos" value="<?= $_SESSION['usuario']['apellidos'] ?>">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

        <label for="email">Email</label>  
        <input type="email" name="email" value="<?= $_SESSION['usuario']['email'] ?>"> 
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

        <input type="submit" name="submit" value="Actualizar">
    </form>
    <?php borrarErrores();   ?>







</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>