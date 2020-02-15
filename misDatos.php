<?php require_once "Includes/cabecera.php";?>
<?php require_once "Includes/lateral.php";?>
<?php require_once "Includes/helpers.php";?>
<?php
    if(!isset($_SESSION['usuario'])){
        Header('Location: index.php');
    }
?>
<div class="principal">
     <?php if(isset($_SESSION['actualizacion']) && !isset($_SESSION['error_general'])) : ?>
        <div class="alerta-exito">
            <h3><?=$_SESSION['actualizacion'];?></h3>
        </div>
    <?php endif ;?>
    <?php if(isset($_SESSION['error_general']) && !isset($_SESSION['actualizacion'])) : ?>
        <div class="alerta-error">
            <h3><?=$_SESSION['error_general'];?></h3>
        </div>
    <?php endif ;?>
    <h2>Mis datos</h2>
    <form action="actualizarDatos.php" class="misDatos" method="POST" class="formCategoria">
        <h1 class="crearCategoria">Actualiza tus datos</h1>

            <label for="titulo" class="descripcionCategoria">Nombre: </label>
            <input type="text" class="inputEditar" name="nombre"><br/>
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'nombre') : '' ;?>
  

            <label for="descripcion" class="descripcionCategoria">Apellidos: </label>
            <input type="text" class="inputEditar" name="apellidos"></input><br/>
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'descripcion') : '' ;?>
            
            <label for="descripcion" class="descripcionCategoria">Email: </label>
            <input  type="text" class="inputEditar" name="email"></input><br>
    <?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'email') : '' ;?>

            <!--
            <select name="categorias">

            </select>
            -->

            <input type="submit" value="Guardar">
    </form>
</div>

<?php require_once "Includes/footer.php";?>
