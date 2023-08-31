<?php
include "header.php";
session_start();
?>

<nav class="navbar navbar-expand-lg w-100 navbar-light bg-light" id="navDesignLogin">

    <div class="col-8 ps-5">
        <a class="navbar-brand" href="catalog.php">
            <img src="./img/logo.png" style="width: 110px; height: 110px;" alt="">
        </a>
    </div>
    <div class="collapse navbar-collapse col-4" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link h4" href="catalog.php">Mi catalogo</a>
            </li>
            <?php
            if (isset($_SESSION['usuario'])) { ?>
                <li class="nav-item">
                <a class="nav-link h4" href="controlador/logout.php">Salir </a>
            </li>
           <?php } ?>
        </ul>
    </div>
</nav>

<!-- Tarjeta -->
<?php
    include('modelo/conexion.php'); // $conexion
    if( isset($_GET['id']) ) {
        $id_juego = $_GET['id'];

        $query_juego = "select * from juego where id_juego = '$id_juego '";
        $result_juego = mysqli_query($conexion, $query_juego);
        $juego = mysqli_fetch_array($result_juego);

    }
?>
<div class="row bg-dark" id="pagDesign">
    <div class="col-sm-12 col-lg-4 col-md-12 my-5 ps-5">
        <img class="img-thumbnail rounded float-start" src="img/<?= $juego['poster'] ?>" alt=""
            style="height: 600; height: 500px;">
    </div>


    <div class="col-lg-8 p-5">
        <div id="title">
            <h1 style="color:white"><?= $juego['nombre_juego'] ?></h1>
        </div>
        <div class="mt-5">
            <p style="color: white;"><?= $juego['sinopsis'] ?></p>
        </div>


        <div class="my-5">
            <div>
                <p>
                <h4 style="color:white">Calificación</h4>
                </p>
                <td class="text-light">
                        <?php  
                            $nota = $juego['puntuacion'];
                            $nota_faltante = 5 - $nota;

                            for($i = 0; $i < $nota; $i++) { ?>

                            <i class="fa-solid fa-star text-warning" style="color: #ffffff;"></i>

                        <?php } 
                        for($j = 0; $j < $nota_faltante ; $j++) { ?>

                            <i class="fa-regular fa-star" style="color: #fafafa;"></i>

                        <?php }  ?>
                    </td>
                <p style="color:white" class="card-text fw-medium"><?= $juego['puntuacion'] ?> Estrellas</p>
                
            </div>

            <?php
                $query_resenas = "SELECT * FROM resenas WHERE id_juego = '$id_juego' ";
                $result_resenas = mysqli_query($conexion, $query_resenas);
                $num_resenas = mysqli_num_rows($result_resenas);
                $resenas = mysqli_fetch_array($result_resenas);
            ?>

        </div>

        <?php
            if(isset($_SESSION['usuario'])) {   ?>
        <div class="dropdown my-4">
            <a class="" href="vistas/agregar_res.php?id=<?= $id_juego ?>">
                <button class="btn btn-primary " type="button">Escribir reseña</button>
            </a>
        </div>

        <?php } ?>

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Nombre</th>
                    <th>Comentario</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include "./modelo/conexion.php";

            if( isset($_GET['id']) ) {
                $id_juego = $_GET['id'];
        
                $query_res = "SELECT * FROM resenas WHERE id_juego = '$id_juego'";
                $result_res = mysqli_query($conexion, $query_res);
                $res = mysqli_fetch_array($result_juego);
            
            }
                

            while($res = mysqli_fetch_array($result_res)) { ?>
                <tr>
                    <td><?= $res['resena_titulo'] ?></td>
                    <td class="text-light"><?= $res['usuario'] ?></td>
                    <td><?= $res['resena_texto'] ?></td>
                    <td class="text-light">
                        <?php  
                            $nota = $res['resena_calificacion'];
                            $nota_faltante = 5 - $nota;

                            for($i = 0; $i < $nota; $i++) { ?>

                            <i class="fa-solid fa-star text-warning" style="color: #ffffff;"></i>

                        <?php } 
                        for($j = 0; $j < $nota_faltante ; $j++) { ?>

                            <i class="fa-regular fa-star" style="color: #fafafa;"></i>

                        <?php }  ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
include "footer.php";
?>