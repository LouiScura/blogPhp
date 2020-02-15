<?php
if(isset($_POST)){
    require_once "Includes/conexion.php"; //Conexion a la base de datos
    
    //Recojer la categoria 
     $nombreCategoria = isset($_POST['nombreCategoria']) ? mysqli_real_escape_string($db,$_POST['nombreCategoria']) : false;     
    
     $nombreCategoria_validado = false;
     //Validar antes de guardar la categoria
        if(!empty($nombreCategoria) && is_string($nombreCategoria) && !preg_match("/[0-9]/", $nombreCategoria)){
             $nombreCategoria_validado = true;
        }else{
             $_SESSION['errorCategoria'] = 'La categoria no puede contener numeros';
        }
     
    //Guardar los datos en la base de datos
        if($nombreCategoria_validado){
             $sql = "INSERT INTO categorias VALUES(null,'$nombreCategoria');";
             $nuevaCategoria = mysqli_query($db, $sql);
             $_SESSION['completadoCategoria'] = 'La categoria se ha completado con exito';
        }else{
             $_SESSION['errorCategoria'] = 'La categoria no puede contener numeros';
        }
}
header('Location: crearCategoria.php');
?>

