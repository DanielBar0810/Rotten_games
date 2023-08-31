<?php

include "../modelo/conexion.php";

if (!empty($_POST["buscar_nombre"]) && !empty($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    
    $sql_query = "SELECT p.poster, p.nombre_juego, g.nombre_genero 
                  FROM juego p 
                  JOIN genero g ON p.id_genero = g.id_genero 
                  WHERE p.nombre_juego LIKE '%$nombre%'";
                  
    $result_juegos = mysqli_query($conexion, $sql_query);
    
    if ($result_juegos) {
        while ($juego = mysqli_fetch_array($result_juegos)) {
            $poster = $juego['poster'];
            $nombre_juego = $juego['nombre_juego'];
            $nombre_genero = $juego['nombre_genero'];
            echo "Poster: $poster, Nombre del Juego: $nombre_juego, Género: $nombre_genero<br>";
        }
    } else {
        echo "Error in database query: " . mysqli_error($conexion);
    }
}

?>
