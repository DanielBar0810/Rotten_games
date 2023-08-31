<?php 
session_start();

if( !isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
    header('Location: ../index.php');
}

include('../header.php'); 
include('../modelo/conexion.php');
    $id=$_GET["id"];
    $juego_sql = "Select * from juego where id_juego=$id;";
    $juego_result=mysqli_query($conexion, $juego_sql);

?>

<h1 class="text-center text-primary mt-5">Editar Juego</h1>
<hr />
<br>
<div class="container">
    <div>
        <form action="../controlador/editar.php" method="POST">
         <input type="hidden" name="id_juego" value="<?= $_GET["id"] ?>">
         <?php
         include ("../controlador/editar.php");
         while ($datoJuego = mysqli_fetch_array($juego_result)) { ?>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-video"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="nombreJuego" placeholder="Nombre del juego" required name="nombre" value="<?= $datoJuego['nombre_juego'] ?>"/>
                    <label for="nombreJuego">Nombre del juego</label>
                </div>
            </div>  
            <div class="input-group">
                <label class="input-group-text" for="selectPortada"><i class="fa-solid fa-image"></i></label>
                <input type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                    id="image_uploads" accept=".jpg, .jpeg, .png" multiple required name="image_uploads" value="../img/<?= $datoJuego['poster'] ?>" />
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="input-group my-3">
                        <span class="input-group-text"><i class="fa-solid fa-explosion"></i></span>
                        <div class="form-floating">
                            <select class="form-select" aria-label="Default select example" required name="genero_id">
                                <option value="" selected>
                                    Seleccione un genero
                                </option>
                                <?php 
                               $query_genero = "SELECT * FROM genero;";
                               $result_generos = mysqli_query($conexion, $query_genero);
                               while ($generos = mysqli_fetch_array($result_generos)) {
                            ?>
                                <option value="<?= $generos['id_genero'] ?>"
                                    <?php 
                                        if($generos['id_genero'] == $datoJuego['id_juego']) {
                                            echo "selected";
                                        }
                                    ?>
                                >
                                    <?= $generos['nombre_genero'] ?>
                                </option>
                                <?php } ?>
                            </select>
                            <label>Genero del juego</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="input-group my-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <div class="form-floating">
                            <select class="form-select" aria-label="Default select example" required name="id_compania">
                                <option value="" selected>
                                    Seleccione una compañia
                                </option>
                                <?php                                
                               $query_companias = "SELECT * FROM compania;";
                               $result_companias = mysqli_query($conexion, $query_companias);
                               while ($compania = mysqli_fetch_array($result_companias)) {
                            ?>
                                <option value="<?= $compania['id_compania'] ?>" 
                                    <?php
                                        if($compania['id_compania'] == $datoJuego['id_compania']) { echo 'selected'; }
                                    ?>
                                >
                                    <?=  $compania['nombre_compania'] ?>
                                </option>
                                <?php } ?>
                            </select>
                            <label>Compañia del juego</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-clock"></i></span>
                        <div class="form-floating">
                            <input min="1" max="5" type="number" class="form-control" id="input_duracion"
                                placeholder="Cantidad en minutos" required name="duracion" value="<?= $datoJuego['duracion'] ?>" />
                            <label for="input_duracion">Duracion (H)</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                        <div class="form-floating">
                            <input min="1930" max="2023" type="number" class="form-control" id="input_anio"
                                placeholder="Año" required name="estreno" min="1980" max="2023" value="<?= $datoJuego['estreno'] ?>"/>
                            <label for="input_anio">Año de estreno</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <div class="form-floating">
                            <input min="0" type="number" class="form-control" id="input_recaudacion"
                                placeholder="Recaudacion en $" required name="recaudacion" value="<?= $datoJuego['recaudacion'] ?>"/>
                            <label for="input_recaudacion">Recaudacion</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px" required name="sinopsis" value=""><?= $datoJuego['sinopsis'] ?></textarea>
                <label for="floatingTextarea2">Sinopsis del juego</label>
            </div>
            <?php } ?>
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success btn-lg" type="submit" name="editar_juego" value="ok">
                    Editar
                </button>
            </div>
        </form>
    </div>
</div>
</div>
<?php include('../footer.php'); ?>