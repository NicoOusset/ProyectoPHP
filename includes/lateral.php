<aside id="sidebar">


    <?php if(isset($_SESSION['usuario'])):  ?>
        <div id="usuario-logueado" class="bloque">
        <h3>Bienvenido,  <?= $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'] ?></h3>

        <a href="cerrar.php" class="boton btn-verde">Crear Entradas</a>
        <a href="crearCategoria.php" class="boton">Crear Categoria</a>
        <a href="cerrar.php" class="boton btn-naranja">Mis Datos</a>
        <a href="cerrar.php" class="boton btn-rojo">Cerrar Sesión</a>
        </div>
    <?php endif;  ?>

    <?php if(!isset($_SESSION['usuario'])):  ?>
            <div id="login" class="bloque">
                <h3>Identificate</h3>

                <?php if(isset($_SESSION['error_login'])):  ?>
                    <div  class="alerta alerta_error">
                        <?= $_SESSION['error_login'] ?>
                    </div>
                <?php endif;  ?>

                <form action="login.php" method="POST">
                    <label for="email">Email: </label>  
                    <input type="email" name="email"> 

                    <label for="password">Contraseña: </label>
                    <input type="password" name="password">

                    <input type="submit" value="Entrar">
                </form>
            </div>

            <div id="register" class="bloque">
                <h3>Registrate</h3>

                <!-- mostrar errores -->
                <?php
                    if (isset($_SESSION['completado'])) {
                        echo "<div class='alerta alerta-exito'>". $_SESSION['completado']."</div>";
                    
                     } elseif (isset($_SESSION['errores']['general'])){
                        echo "<div class='alerta alerta_error'>". $_SESSION['errores']['general']."</div>";
                    }
                ?>

                <form action="registro.php" method="POST">
                    <label for="nombre">Nombre</label>  
                    <input type="nombre" name="nombre"> 
                    <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellidos">Apellidos</label>  
                    <input type="apellidos" name="apellidos">
                    <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                    <label for="email">Email</label>  
                    <input type="email" name="email"> 
                    <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                    <input type="submit" name="submit" value="Registrar">
                </form>
                <?php borrarErrores();   ?>
            </div>
        <?php endif;  ?>
        </aside>
        