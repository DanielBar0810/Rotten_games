<?php
 include "header.php";
?>

<nav class="navbar navbar-expand-lg w-100 navbar-light bg-light" id="navDesignLogin">

    <div class="col-8 ps-5">
        <a class="navbar-brand" href="catalog.php">
            <img src="./img/logo.png"
                style="width: 110px; height: 110px;" alt="">
        </a>
    </div>
    <div class="collapse navbar-collapse col-4" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link h4" href="catalog.php">Mi catalogo</a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item nav-link h4" href="controlador/logout.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    
</nav>

<section class="text-light mt-5 text-center">
    <div class="container p-5" style="background-color: #E7E7E7;" id="containerCatalog">
        <div class="d-sm-flex align-items-center row">
        <!-- Tarjeta -->
        <?php
            include('modelo/conexion.php'); //$conexion
            $query = "SELECT * FROM juego p INNER JOIN compania d on p.id_compania = d.id_compania";
            $result = mysqli_query($conexion, $query); // array

            while($juego = mysqli_fetch_array($result)) {
        ?>
                <div class="card p-1 ms-5 mt-5 text-dark col-lg-4" style="width: 18rem;">
                <img src="./img/<?= $juego['poster'] ?>" class="card-img-top img-thumbnail" style="width: 500px; height: 300px;" alt="...">
                <div class="card-body mt-2" style="background-color:#E7E7E7; color: black;">
                    <p class="card-text fw-medium"><?= $juego['nombre_juego'] ?> (<?= $juego['estreno'] ?>)</p>
                    <p class="card-text fw-medium"><?= $juego['nombre_compania'] ?></p>
                    <p class="card-text fw-medium"><?= $juego['puntuacion'] ?> Estrellas</p>
                    <a href="pag1.php?id=<?= $juego['id_juego'] ?>" class="btn btn-success">Ver reseñas</a>
                </div>
            </div>

        
            <?php } ?>

            <div class="d-sm-flex align-items-center row my-5">
            </div>
        </div>
</section>

<?php
include "footer.php";
?>