
<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>

<?php
    $categoria = conseguirCategoria($db, $_GET['id']);
    if (!isset($categoria['id'])) {
        header("Location: index.php");
    }
?>   

<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">
    

    <h1>Entradas de <?=$categoria['nombre']?></h1>

    <?php
        $entradas = conseguirTodasEntradas($db, $_GET['id']);
       
        if(!empty($entradas)):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entradas">
            <a href="entrada.php?id=<?=$entrada['id']?>">    
                <h2> <?=$entrada['titulo']?> </h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p> <?= substr($entrada['descripcion'], 0, 179 )."..."?> </p>
            </a>
         </article>

    <?php
            endwhile;
        else:      
    ?>
        <div class="alerta">No hay entradas en esta categoria</div>
    
    <?php  endif;  ?>       
</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
