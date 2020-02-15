<?php require_once "Includes/cabecera.php";?>
<?php require_once "Includes/lateral.php";?>
<?php require_once "Includes/helpers.php";?>
<?php 
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
?>
<div class="principal">
    <?php if(isset($_SESSION['completadaEntrada'])):?>
        <div class="alerta-exito">
            <h3>Entrada creada con exito</h3>
            <a href="index.php" class="boton editar">Click aqui para ver tu entrada</a>
        </div>
    <?php endif ;?>
    <form action="guardar-entrada.php" method="POST" class="formCategoria">
        <h1 class="crearCategoria">Crear entrada</h1>
        <p class="descripcionCategoria">Agrega nuevas entrada al blog para que puedan ver tus amigos</p>
            <label for="titulo" class="descripcionCategoria">Ingrese el nuevo titulo: </label>
            <input type="text" class="inputEditar" name="titulo"><br/>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarErrores($_SESSION['errores_entradas'], 'titulo') : ''; ?>

            <label for="descripcion" class="descripcionCategoria">La nueva descripcion: </label>
            <textarea class="inputEditar" name="descripcion"></textarea><br/>
    <?php echo isset($_SESSION['errores_entradas']) ? mostrarErrores($_SESSION['errores_entradas'], 'descripcion') : ''; ?>
            <!--
            <select name="categorias">

            </select>
            -->

            <input type="submit" value="Guardar">
    </form>
</div>
<?php

?>



<?php require_once "Includes/footer.php";?>