<?php
   if ( isset($_GET['id']) ) {
      include('../modelo/conexion.php'); // $conexion
      $id_juego = $_GET['id'];

      $query = "DELETE FROM juego WHERE id_juego = '$id_juego';";

      echo $query;

      $result = mysqli_query($conexion, $query);

      if(!$result) {
         die("Ocurrio un error al intentar eliminar."/);
      }
   }
   header('Location: ../admin.php');
?>