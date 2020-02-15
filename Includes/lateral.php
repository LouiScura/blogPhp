<?php require_once "Includes/helpers.php";?>
<?php //session_start();?>
<!--LATERAL--->
        <aside id="sidebar">
            <?php if(isset($_SESSION['usuario'])) :?>
                <div class="usuario-logueado">
                    <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h3>
                    <!--BOTONES-->
                    
                    <a href="crearEntrada.php" class="boton crear-crear">Crear Entrada</a><br/>
                    <a href="crearCategoria.php" class="boton crear-categoria">Crear Categoria</a><br/>
                    <a href="misDatos.php" class="boton editar">Mis datos</a><br/>
                    <a href="cerrar.php" class="boton cerrar">Cerrar sesion</a>
                </div>
            <?php endif ;?>
        
            
            <?php if(!isset($_SESSION['usuario'])) :?>
            <div id="login" class="block-aside">
                <h2>Entrar a la web</h2>
            <?php if(isset($_SESSION['error-login']) && !isset($_SESSION['usuario'])) : ?>
                <div class="alerta-error">
                    <h3><?=$_SESSION['error-login']?></h3>
                </div>
            <?php endif ;?>
            
         
                <form action="login.php" method="POST">
                    <label for="user">User:</label><br/>
                    <input type="text" name="email"><br/>
                           
                    <label for="password">Password:</label><br/>
                    <input type="password" name="password"><br/>
                    
                    <input  name="submit" type="submit" value="Login"/>
                </form>
            </div>
             
            <div id="register" class="block-aside">
                <h2>Register</h2>
            <!--MOSTRAR ERRORES --->
            <?php if(isset($_SESSION['completado'])) : ?>
                <div class="alerta-exito"><?=$_SESSION['completado'];?></div>
            <?php endif; ?>
                <form  action="register.php" method="POST"> 
                    <label for="name">Name:</label><br/>
                    <input type="text" name="name"><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'name') : ''; ?>
                    <label for="apellidos">Apellidos:</label><br/>
                    <input type="text" name="apellidos"><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'apellidos') : ''; ?> 
                    
                    <label for="email">Email:</label><br/>
                    <input type="text" name="email"><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'email') : ''; ?> 
                           
                    <label for="password">Password:</label><br/>
                    <input type="password" name="password"><br/>
                <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'password') : ''; ?> 
                    
                    <input name="submit" type="submit" value="Register"/>
                </form>
            </div>
            <?php endif ;?>
            <?php borrarError();?>
        </aside>
<!--FIN DEL LATERAL-->