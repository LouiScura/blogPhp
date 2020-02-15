<?php
if(isset($_POST)){
    require_once "Includes/conexion.php"; //Conexion a la base de datos
    
    //Recojer valores del formulario
    $nombre = isset($_POST['name']) ? mysqli_real_escape_string($db,$_POST['name']) : false;
    $apellidos = isset($_POST['lastName']) ? mysqli_real_escape_string($db,$_POST['lastName']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
    
    $errores = array(); //Array con los errores posibles
    
    //Validar datos antes de guardarlos
    if(!empty($_POST['name']) && !is_numeric($_POST['name']) &&  !preg_match("/[0-9]/", $nombre)){
        $validar_nombre = true;
    }else{
        $validar_nombre = false;
        $errores['name'] = 'Por favor introduzca bien el nombre';
    }
    
    if(!empty($_POST['apellidos']) && !is_numeric($_POST['apellidos']) &&  !preg_match("/[0-9]/", $apellidos)){
        $validar_apellidos = true;
    }else{
        $validar_apellidos = false;
        $errores['apellidos'] = 'Por favor introduzca bien el apellido'; 
    }
    
    if(!empty($_POST['email']) && !is_numeric($_POST['email']) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validar_email = true;
    }else{
        $validar_email = false;
        $errores['email'] = 'Por favor introduce bien el email';
    }
    
    if(!empty($_POST['password'])){
        $validar_password = true;
    }else{
        $validar_password = false;
        $errores['password'] = 'Por favor introduzca bien la password';
    }
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' =>4]);//Cifrar la contrasena
        
        //Insetar usuarios en la base de datos
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE());"; //CREAMOS LA CONSULTA
        $guardar = mysqli_query($db, $sql);
        
        if($guardar){
            $_SESSION['completado'] = 'Se ha completado con exito';
        }else{
            $_SESSION['errores']['general'] = 'Ha fallado al completar';
        }
        
    }else{
        $_SESSION['errores'] = $errores;
    }
}
header("Location: index.php");
?>
