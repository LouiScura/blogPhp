<?php
if(isset($_POST)){
    require_once 'Includes/conexion.php';
    //Recojer los datos
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
    $usuario = $_SESSION['usuario']['id'];
    
    //Validar los datos
    $errores = array();
    
    if(!empty($titulo) && is_string($titulo) && !preg_match("/[0-9]/", $titulo)){
        $guardar_entrada = true;
    }else{
        $errores['titulo'] = 'Por favor ingrese un titulo valido';
    }
    
    if(!empty($descripcion) && is_string($titulo) && !preg_match("/[0-9]/", $descripcion)){
        $guardar_entrada = true;
    }else{
        $errores['descripcion'] = 'Por favor ingrese una descripcion valido';
    }   
    
    if(count($errores) == 0){
        $_SESSION['completadaEntrada'] = 'Se ha completado con exito';
        $sql = "INSERT INTO entradas VALUES(null,$usuario,1,'$titulo','$descripcion',CURDATE()); ";
        $entradas = mysqli_query($db, $sql);  
    }else{
        $_SESSION['errores_entradas'] = $errores;
    }
}
header('Location: crearEntrada.php');
?>

