<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>

<?php
    $entrada = conseguirEntrada($db, $_GET['id']);
    
    if (!isset($entrada['id'])) {
        header("Location: index.php");
    }
?>   

<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">

    <?php
        if(!empty($entrada)):
        //    var_dump($entrada);
        //    die();
    ?>
        <h3 class="entradaH3"><?=$entrada['titulo']?></h3>

            
        <article class="entradas">
            <a href="categoria.php?id=<?=$entrada['categoria_id']?>">
                <span class="fecha2"><?=$entrada['categoria']?></span>
            </a>    
            <br>
            <span class="fecha"><?=$entrada['fecha'].' | '.$entrada['usuario']?></span>
            <p> <?= nl2br($entrada['descripcion'])?></p>
       
        </article>

        <?php
            if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id']== $entrada['usuario_id']):
        ?>
            <br>
            <a href="editarEntrada.php?id=<?=$entrada['id']?>" class="boton btn-verde">Editar Entrada</a>
            <a href="borrarEntrada.php?id=<?=$entrada['id']?>" class="boton">Borrar entrada</a>      
        <?php  endif;  ?>  

    <?php
            
        else:      
    ?>
        <div class="alerta">No existe esta entrada</div>
    
    <?php  endif;  ?>       
</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
