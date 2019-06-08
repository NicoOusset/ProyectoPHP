
<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>

<?php
    if (!isset($_POST['busqueda'])) {
        header("Location: index.php");
    }    
    
?>   

<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">
    
    <?php
        $busqueda = conseguirTodasEntradas($db, null, $_POST['busqueda']);
    ?>   
        <h1>Busqueda:  <?=$_POST['busqueda']?></h1>
    <?php    
        if(!empty($busqueda)):
            while($busquedas = mysqli_fetch_assoc($busqueda)):
    ?>

        <article class="entradas">
            <a href="entrada.php?id=<?=$busquedas['id']?>">    
                <h2> <?=$busquedas['titulo']?> </h2>
                <span class="fecha"><?=$busquedas['categoria'].' | '.$busquedas['fecha']?></span>
                <p> <?= substr($busquedas['descripcion'], 0, 179 )."..."?> </p>
            </a>
         </article>

    <?php
            endwhile;
        else:      
    ?>
        <div class="alerta">No hay entradas que coincidan con tu busqueda</div>
    
    <?php  endif;  ?>       
</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
