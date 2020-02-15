<?php
if(isset($_POST)){
   //Conexion a la base datos
   require_once 'Includes/conexion.php';   
   
   //Recojer los datos que quiere actualizar el pes
   $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
   $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
   $email = isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
   
   $errores = array();
   
   //Una vez capturados validarlos
   if(is_string($nombre) && !empty($nombre) && !preg_match("/[0-9]/", $nombre)){
       $usuario_actualizado = true;
   }else{
       $errores['nombre'] = 'El nombre no puede contener numeros';
   }
   
   if(is_string($apellidos) && !empty($apellidos)&& !preg_match("/[0-9]/", $apellidos)){
       $usuario_actualizado = true;
   }else{
       $errores['apellidos'] = 'El apellido no puede contener numeros';
   }
   
   if(is_string($email) && !empty($apellidos)&& !preg_match("/[0-9]/", $apellidos) && filter_var($email, FILTER_VALIDATE_EMAIL)){
       $usuario_actualizado = true;
   }else{
       $errores['email'] = 'Por favor ingrese un email correcto';
   }
 
   if(count($errores) == 0){
       $usuario = $_SESSION['usuario'];
       $usuario_actualizado = true;
       //COMPROBAR SI EL EMAIL YA EXISTE
       $sql = "SELECT id,email FROM usuarios WHERE email = '$email'";
       $isset_email = mysqli_query($db, $sql);
       $isset_user = mysqli_fetch_assoc($isset_email);
       
       if($usuario['id'] == $isset_user['id'] || !empty($isset_email)){//Si el iset email ta vacio es pq no hay un email igual
        //SI SE CUMPLE LA CONDICION , ACTUALIZAR EN LA TABLA USUARIOS DE LA BASE DE DATOS 
        $sql = "UPDATE usuarios SET ".
                "nombre = '$nombre', ".
                "apellidos = '$apellidos', ".
                "email = '$email' ".
                "WHERE id = ".$usuario['id'];
        
        $guardar = mysqli_query($db, $sql);
        
        $_SESSION['actualizacion'] = 'Se ha actualizado con extio;';
       
       }else{
           $_SESSION['error_general'] = 'El email ya existe!!';
       }
       var_dump($_SESSION['error_general']);
       die();
   }else{
       $_SESSION['errores'] = $errores;
   }
}
header('Location: misDatos.php');
?>

