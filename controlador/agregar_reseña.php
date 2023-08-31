<?php 
include('../modelo/conexion.php');
if (!empty($_POST["btn-agregar_res"])) {
    if (!empty($_POST["comentario"]) and !empty($_POST["titulo_com"]) and !empty($_POST["calificacion"]) and !empty($_POST["id_juego"]) and !empty($_POST["id_usuario"])) {      
        $titulo_com=$_POST['titulo_com']; 
        $comentario = $_POST['comentario'];
        $id_juego=$_POST['id_juego'];
        $id_usuario = $_POST['id_usuario']; 
        $calificacion=$_POST['calificacion']; 
         
        $sql= $conexion->query("insert into comentarios(`titulo_com`, `comentario`, `id_juego`, `id_usuario`, `calificacion`) values ('$titulo_com','$comentario','$id_juego','$id_usuario','$calificacion');");

        if ($sql==1) {
            # code...
            echo '<div class="alert alert-success">Comentario registrado correctamente</div>';
            header('Location: ../vistas/agregar_res.php');
        } else {
            # code...
            echo '<div class="alert alert-danger">Comentario no registrado</div>';
        } 
    } else {
        echo '<div class="alert alert-warning">Faltan campos por rellenar</div>';
    }
    
}
?>