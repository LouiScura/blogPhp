<?php
require_once 'Includes/conexion.php';
if(isset($_SESSION['usuario'])){
    session_unset();
}
header('Location: index.php');
?>

