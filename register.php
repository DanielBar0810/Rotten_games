<?php
 include "header.php";

 /*if( !isset($_SESSION['usuario']) || $_SESSION['usuario'] == "admin" ) {
    header('Location: index.php');
 }*/

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
        </ul>
    </div>
</nav>

<section class="">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10">
                <div class="card rounded-3 text-black" style="background-color: #E7E7E7;">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="img/logo.png" style="width: 185px;" alt="logo">

                                </div>
                                <?php
                                include "./modelo/conexion.php";
                                include "controlador/registro_controlador.php";
                                ?>

                                <div>
                                    <p>Ingresa los siguientes datos para el registro:</p>
                                </div>

                                <form action="controlador/registro_controlador.php" method="POST">
                                    <div class="my-3">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombres"
                                            placeholder="Ingresa tu nombre" required>
                                    </div>

                                    <div class="my-3">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" name="apellidos"
                                            placeholder="Ingresa tu apellido" required>
                                    </div>

                                    <div class="my-3">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control" name="usuario"
                                            placeholder="Ingresa tu nombre usuario" required>
                                    </div>

                                    <div class="my-3">
                                        <label>Correo electronico</label>
                                        <input type="text" class="form-control" name="correo"
                                            placeholder="Ingresa un correo electronico" required>
                                    </div>

                                    <div class="my-3">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" name="contrasena"
                                            placeholder="Ingresa tu contraseña" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary my-3"
                                        name="btnRegistrar">Registrate</button>
                                    <p class="fst-italic" style="font-weight: 400;">Si te registras, estarás de acuerdo
                                        con las Condiciones de Uso y Politica de privacidad que tiene Rotten Games</p>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex py-5" id="sBloqueRegister">
                            <div class="text-white px-3 py-5 p-md-2 mx-md-4">
                                <h4 class="mb-4">Al registrarte con nosotros disfrutas los siguientes beneficios</h4>
                                <ul class="">
                                    <p class="my-5"> <b>Contribución</b> <br>
                                        Añade reseñas de todas los juego de nuestro catalogo para que todos conozcan
                                        tu opinión.
                                    </p>
                                    <p class="my-5"><b>Personalización</b> <br>
                                        Los juegos recomendadas serán en base a las que hayas reseñado.
                                    </p>
                                    <p class="my-5"><b>Anticipo</b> <br>
                                        Recibe e-mails que te notifiquen antes que todos los juego más recientes.
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>