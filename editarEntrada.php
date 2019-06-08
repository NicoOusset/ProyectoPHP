<?php require_once 'includes/redireccion.php'; ?>

<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
   
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<?php
    $entrada = conseguirEntrada($db, $_GET['id']);
    
    if (!isset($entrada['id'])) {
        header("Location: index.php");
    }

    $_SESSION['entrada_actual']= $entrada['id'];
?>


<!-- Contenido Principal -->
<div id="principal">
    <h1>Editar entrada</h1>
    
    <form action="actualizarEntrada.php" method="POST">

        <label for="titulo">Titulo </label>
        <input type="text" name="titulo" value="<?= $entrada['titulo']?>">
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripción: </label>
        <textarea name="descripcion" id="" cols="30" rows="10" ><?php echo $entrada['descripcion']; ?></textarea>
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria" >
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    
                    while($categoria = mysqli_fetch_assoc($categorias)):
                        $seleccionada="";
                        if($categoria['id']==$entrada['categoria_id']):
                            $seleccionada ="selected";
                        endif;    
            ?>      
                        <option value="<?=$categoria['id']?>" <?=$seleccionada?>>
                            <?=$categoria['nombre']?>
                        </option> 
            <?php 
                    endwhile;
                endif;    
            ?>        
        </select>
        <?php  echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>  

        <input type="submit" value="Editar" >
    
    </form>
    
    <?php borrarErrores(); ?>
</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
