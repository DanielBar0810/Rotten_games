<?php
include('../modelo/conexion.php');
if (!empty($_POST["crear_juego"])) {
    if (!empty($_POST["nombre_juego"]) and !empty($_POST["poster"]) and !empty($_POST["id_genero"]) and !empty($_POST["id_compania"]) and !empty($_POST["duracion"]) and !empty($_POST["estreno"]) and !empty($_POST["puntuacion"]) and !empty($_POST["recaudacion"]) and !empty($_POST["sinopsis"])) {        
        $nombre_juego= $_POST["nombre_juego"];
        $image_uploads = $_POST["poster"];
        $id_genero= $_POST["id_genero"];
        $id_compania= $_POST["id_compania"];
        $duracion= $_POST["duracion"];
        $puntuacion = $POST["puntuacion"];
        $estreno= $_POST["estreno"];
        $recaudacion= $_POST["recaudacion"];
        $sinopsis= $_POST["sinopsis"];
        
        $sql= $conexion->query("INSERT INTO `juego`(`nombre_juego`, `poster`, `id_genero`, `id_compania`, `duracion`, `puntuacion`, `estreno`, `recaudacion`, `sinopsis`) VALUES ('$nombre_juego','$poster','$genero','$compania','$duracion','$puntuacion','$estreno','$recaudacion','$sinopsis')");

        if ($sql==1) {            
            echo '<div class="alert alert-success">Juego registrado correctamente</div>';
            header('Location: ../admin.php');
        } else {            
            echo '<div class="alert alert-danger">Juego no registrado</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Faltan campos por rellenar</div>';
    }
}


?>