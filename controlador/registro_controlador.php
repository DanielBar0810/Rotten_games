<?php
   if(isset($_POST['btnRegistrar'])) {
   $server = 'localhost';
    $usuario = 'root';
    $pass = '';
    $db = 'rotten_tomatoes';
    $conn = mysqli_connect($server, $usuario, $pass, $db);
    
    // Obtiene los datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
   $correo = $_POST['correo'];
   $contrasena = $_POST['contrasena'];

   $query_insert = "INSERT INTO login(nombres, apellidos, usuario, correo, contrasena) 
                     VALUES ('$nombres', '$apellidos', '$usuario', '$correo', '$contrasena')";

   $result_insert = mysqli_query($conn, $query_insert);
   
   if (!$result_insert) {
      die('Ocurrio un error de crear usuario');
   }

   header('Location: ../index.php');
   }
?>