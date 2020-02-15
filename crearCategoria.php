<?php require_once "Includes/cabecera.php";?>
<?php require_once "Includes/lateral.php";?>
<?php require_once "Includes/helpers.php";?>
<?php 
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
?>

<div class="principal">
    <?php if(isset($_SESSION['completadoCategoria'])) :?>
        <div class="alerta-exito">
            <h4><?=$_SESSION['completadoCategoria'];?></h3>
        </div>
    <?php endif ;?>
    <h1 class="crearCategoria">Crear categoria</h1>
    <p class="descripcionCategoria">Agrega nuevas categorias al blog para que puedan ver tus amigos</p>
    
    <form action="guardar-categoria.php" method="POST" class="formCategoria">
        
        <label for="nombreCategoria">Ingrese el nombre: </label>
        <input type="text" class="inputEditar" name="nombreCategoria"><br/>
    <?php if(isset( $_SESSION['errorCategoria'])) :?>
        <div class="alerta-error">
            <h3>No puede contener numeros</h3>
        </div>
    <?php endif;?>
  
        <input type="submit" value="Guardar">
    </form>
</div>
<?php require_once "Includes/footer.php";?>