<?php require_once 'conexion.php'; ?>
<?php require_once 'helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="Assets/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Slabo+27px&display=swap" rel="stylesheet">
    <title>Blog de Videojuegos</title>
</head>
<body>
    <!--CABECERA --->
    <header id="header">
        <div class="logo">
            <a>Blog de videojuegos</a>
        </div>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
            </ul>
               <?php
                $categorias = conseguirCategoria($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):            
            ?>
            <ul>
                <li> 
                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                </li>
            </ul>
            <?php   
                    endwhile;
                endif;
            ?>
            <ul>
                <li><a href="index.php">Sobre mi</a></li>
            </ul>
            <ul>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <!--CONTENEDOR--->
    <div id="container">
        