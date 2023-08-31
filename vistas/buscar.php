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
            include "../controlador/buscar_nombre.php";
            while($juego = mysqli_fetch_array($result_juegos)) 
        { ?>

        <tr>
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
                        <li><a class="dropdown-item" href="./vistas/editar_juego.php">Editar</a></li>
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php 
      } ?>
    </tbody>

</table>