
<?php require_once 'includes/redireccion.php'; ?>

<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
   
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">
    <h1>Crear categorias</h1>

    <p>Añade nuevas categorías para que los usuarios puedan usarlas al crear sus entradas.</p>
    <br>
    
    <form action="guardarCategoria.php" method="POST">

        <label for="nombre">Nombre de la categoría: </label>
        <input type="text" name="nombre" >

        <input type="submit" value="Guardar" >
    
    </form>

</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
