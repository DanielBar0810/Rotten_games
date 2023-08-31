<?php 

session_start();
 if( !isset($_SESSION['usuario']) ) {
    header('Location: index.php');
 }

include('../header.php');

    include('../modelo/conexion.php'); //$conexion
    // include ("../controlador/agregar_reseña.php");
    if(isset($_GET['id'])) {
      $id_juego = $_GET["id"];
    }
    
    if( isset($_POST["btn-agregar_res"]) ){
      print_r($_POST);
      $id = $_POST['id_juego'];
      $titulo = $_POST['titulo_com'];
      $calificacion = $_POST['calificacion'];
      $comentario = $_POST['comentario'];

      $query = "INSERT INTO resenas (usuario, resena_titulo, resena_texto, resena_calificacion, id_juego) 
                VALUES('@usuario', '$titulo', '$comentario', '$calificacion', '$id');";

      $result_insert = mysqli_query($conexion, $query);

      header("Location: ../pag1.php?id=$id");
    }
    
?>
<section class="bg-dark">
    <div class="container p-5 text-center">
      <div class="bg-primary p-5">
      <h1 class="text-warning">Reseña de juego</h1>
      <i class="fa fa-star fa-lg"></i>
      <i class="fa fa-star fa-lg"></i>
      <i class="fa fa-star fa-lg"></i>
      <i class="fa fa-star fa-lg"></i>
      <i class="fa fa-star fa-lg"></i>
      <style>
        .fa-star,
        .fa-star-o {
          color: yellow;
        }
      </style>


      <form action="agregar_res.php" method="POST">
          <div class="input-group  mt-5 mb-3">
            <div class="form-floating d-sm-flex">
              <h4 class="text-warning mt-2 me-4 ps-4">Nombre:</h4>
              <input type="text" class="form-control" name="titulo_com"/>
              <input type="hidden" name="id_juego" value="<?= $id_juego ?>">
            </div>
          </div>

          <div class="input-group  mt-5 mb-3">
            <div class="form-floating d-sm-flex">
              <h4 class="text-warning me-3">Calificacion:</h4>
              <input min="1" max="5" type="number" placeholder="1-5" name="calificacion">
            </div>
          </div>

          <div class="form-floating mt-5">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="comentario"></textarea>
            <label for="floatingTextarea2">Escribe la reseña del juego...</label>
          </div>
          <button class="btn btn-success btn-lg mt-5" type="submit" name="btn-agregar_res" value ="ok">Agregar</button>
      </form>
    </div>
  </div>
</section>
<?php include('../footer.php'); ?>