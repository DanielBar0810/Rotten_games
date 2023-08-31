<?php
include "../modelo/conexion.php"  ;


// if (!empty($_POST["id_juego"])) {
//     if (!empty($_POST["nombre"]) and !empty($_POST["image_uploads"]) and !empty($_POST["genero_id"]) and !empty($_POST["id_compania"]) and !empty($_POST["duracion"]) and !empty($_POST["estreno"]) and !empty($_POST["recaudacion"]) and !empty($_POST["sinopsis"])) {    
if( isset($_POST['editar_juego']) ) {  
        $id = $_POST['id_juego'];  
        $nombre= $_POST["nombre"];
        $poster= $_POST["image_uploads"];
        $genero= $_POST["genero_id"];
        $compania= $_POST["id_compania"];
        $duracion= $_POST["duracion"];
        $estreno= $_POST["estreno"];
        $recaudacion= $_POST["recaudacion"];
        $sinopsis= $_POST["sinopsis"];
        
        $sql_query = "UPDATE `juego` SET `nombre_juego`='$nombre',`id_genero`='$genero',`id_compania`='$compania',`duracion`='$duracion',`estreno`='$estreno',`sinopsis`='$sinopsis', `poster`= '$poster',`recaudacion`= '$recaudacion' WHERE id_juego = '$id';";

        mysqli_query($conexion, $sql_query);
        header('Location: ../admin.php');        
    } else {
        echo '<div class="alert alert-warning">Faltan campos por rellenar</div>';
    }
    


// header('Location: ../admin.php');
?>