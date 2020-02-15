<?php require_once "Includes/cabecera.php";?>

<?php require_once "Includes/lateral.php";?>

<?php require_once "Includes/helpers.php";?>

        <!--ARTICULOS-->
        <div class="principal">
            <h2>Ultimas entradas</h2>
            <?php
            $entradas = conseguirEntradas($db);
            if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)):
            
            ?>
            <article class="entradas">
                <h3><?=$entrada['titulo'];?></h3>
                <span><?=$entrada['fecha'].' | '.$entrada['nombre'];?></span>
                <p><?=$entrada['descripcion'];?></p>
            </article>
            <?php
                endwhile;
            endif;;
            ?>
            <div>
                <a href="verTodas.php" class="ver-todas">Ver todas las entradas</a>
            </div>
        </div>
 
<?php require_once "Includes/footer.php";?>
