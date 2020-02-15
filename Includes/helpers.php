<?php
function mostrarErrores($errores, $campo){
   $alerta = '';
   if(isset($errores[$campo]) && !empty($campo)){
       $alerta = "<div class='alerta-error'>".$errores[$campo]."</div>";
   }
   return $alerta;  
}
function borrarError(){
    $borrado = false;
    
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true; //AL ACTUALIZAR BORRA LA SESSION
    }
    
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }
    
    if(isset($_SESSION['error-login'])){
        $_SESSION['error-login'] = null;
        $borrado = true;
    }
    
    if(isset($_SESSION['categoriaCompletado'])){
        $_SESSION['categoriaCompletado'] = null;
        $borrado = true;
    }
   
    if(isset($_SESSION['errorCategoria'])){
        $_SESSION['errorCategoria'] = null;
        $borrado = true;
    }
    
    /*if(isset($_SESSION['errores_entradas'])){}*/
 
    return $borrado; //MUY IMPORTANTE QUE DEVUELVA ALGO 
}
function conseguirCategoria($conexion){
    $sql = 'SELECT * FROM categorias ORDER BY id ASC;';
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();
    
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    
    return $resultado;
}
function conseguirEntradas($conexion,$categoria = null){//FALTA CATEGORIA
    $sql = "SELECT e.*,c.nombre FROM entradas e ".
          "INNER JOIN categorias c ON e.categorias_id = c.id ".
          "ORDER BY e.id DESC LIMIT 4";    
               
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    
    return $resultado;    
}
?>

