<?php require_once 'includes/redireccion.php'; ?>

<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
   
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">
    <h1>Crear entradas</h1>

    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas.</p>
    <br>
    
    <form action="guardarEntrada.php" method="POST">

        <label for="titulo">Titulo </label>
        <input type="text" name="titulo" >
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria" >
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>      
                        <option value="<?=$categoria['id']?>">
                            <?=$categoria['nombre']?>
                        </option> 
            <?php 
                    endwhile;
                endif;    
            ?>        
        </select>
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>  


        <input type="submit" value="Guardar" >
    
    </form>
    
    <?php borrarErrores(); ?>
</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
