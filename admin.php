<?php
 include "header.php";
 session_start();

 if( !isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
  header('Location: index.php');
 }
?>
<nav class="navbar navbar-expand-lg color-navbar">
    <div class="container-fluid">
      <!--<a class="navbar-brand">CineView</a>//-->
      <img src="img/logo.png" class="tamaño-logo">
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administrador
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="controlador/logout.php">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </form>
    </div>
  </nav>
  <br>
  <div class="container">
    <center>
      <h1 class="tipo-letra">¡Bienvenido, @<?= $_SESSION['usuario'] ?>!</h1>
    </center>
    <br>
    <div class="container-fluid d-flex align-items-center justify-content-between juego">
      <form class="d-flex col-3" role="search" action="vistas/buscar.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nombre_juego">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>    
      <div class="ms-auto text-center col-4">
        <a href="vistas/crear_juego.php" class="btn btn-primary"><strong>+</strong> Agregar juego </a>
      </div>
    </div>
    <br>
    <br>
    <table class="table table-striped-columns">
      <thead>
        <tr>
          <th>Poster</th>
          <th>Nombre del juego</th>
          <th>Genero</th>
          <th>Acciones</th>
        </tr> 
      </thead>
      <tbody>
          <?php
            include "./modelo/conexion.php";
            
            $query_juegos = "SELECT * FROM juego p INNER JOIN genero g on p.id_genero = g.id_genero";
            $result_juegos = mysqli_query($conexion, $query_juegos);

            while($juego = mysqli_fetch_array($result_juegos)) { ?>
        <tr>
        <!--  -->
          <td>
            <div clas="d-flex justify-content-center">
              <img class="" src="./img/<?= $juego['poster'] ?>" width="100em" height="120em">
            </div>
          </td>
          <td><?= $juego['nombre_juego'] ?></td>
          <td><?= $juego['nombre_genero'] ?></td>
          <td>
            <div class="dropdown text-center">
              <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Acciones...
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="vistas/editar_juego.php?id=<?= $juego['id_juego'] ?>">Editar</a></li>
                <li><a class="dropdown-item" href="controlador/eliminar_juego.php?id=<?= $juego['id_juego'] ?>">Eliminar</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php
include "footer.php";
?>