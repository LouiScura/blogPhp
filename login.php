<?php 
if(!isset($_POST)){
    session_start();
}
if(isset($_POST)){
    require_once 'Includes/conexion.php';//Conexion a la base de datos
    // Borrar error antiguo
	if(isset($_SESSION['error_login'])){
           session_unset($_SESSION['error_login']);
    }
    
    
    //Recojemos los datos del usuario
    $email = $_POST['email']; 
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";//Comparamos los emails
    $login = mysqli_query($db, $sql);//Hacemos la consulta a la base de datos
    
    if($login && mysqli_num_rows($login) == 1){//Verificamos que solo nos llege un email
        $usuario = mysqli_fetch_assoc($login);//Array asosciativo
   
        //Comparar las dos passwords
        $verify = password_verify($password, $usuario['password']);//Compara la igualdad de las passwords
        if($verify){
            //Utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
            /*if(isset($_SESSION['error-login'])){
                session_unset();
            }*/
        }else{
            //Si algo falla enviar una sesion con el fallo
            $_SESSION['error-login'] = 'Login Incorrecto!!';
        }
    }else{
        //Mensaje error
         $_SESSION['error-login'] = 'Login Incorrecto!!';
    }
}
// Redirijir al index.php
header('Location: index.php');
?>
