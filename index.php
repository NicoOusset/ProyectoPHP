<!-- Cabecera -->
<?php require_once 'includes/cabecera.php'; ?>
   
<!-- Barra lateral -->
<?php require_once 'includes/lateral.php'; ?>

<!-- Contenido Principal -->
<div id="principal">
    <h1>Ultimas entradas</h1>

    <?php
        $entradas = conseguirUltEntradas($db);
       
        if(!empty($entradas)):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
        <article class="entradas">
            <a href="">    
                <h2> <?=$entrada['titulo']?> </h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p> <?= substr($entrada['descripcion'], 0, 179 )."..."?> </p>
            </a>
         </article>

    <?php
            endwhile;
        endif;    
    ?>

    <div id="ver-todas">
        <a href="">Ver todas las entradas</a>
    </div>

</div>

<!-- pie de pagina -->
<?php require_once 'includes/pie.php'; ?>
