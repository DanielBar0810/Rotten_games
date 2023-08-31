<?php include('../header.php'); ?>

<?php
    include('../modelo/conexion.php');
   include ("../controlador/agregar.php");
?>

<!-- Formulario para agregar juegos -->
      <div class="container col mt-2 p-4 rounded bg-success-subtle">
         <h1 class="text-center text-primary">Crear juego</h1>
         <hr />
         <div class="row">
            <div class="col-sm-12 col-md-6">
               <form
                  action="crear_juego.php"
                  method="POST"
                  enctype="multipart/form-data"
               >
                  <div class="input-group mb-3">
                     <span class="input-group-text"
                        ><i class="fa-solid fa-video"></i
                     ></span>
                     <div class="form-floating">
                        <input
                           type="text"
                           class="form-control"
                           id="nombreJuego"
                           placeholder="Nombre del juego"
                           required
                           name="nombre"
                        />
                        <label for="nombreJuego">Nombre de el juego</label>
                     </div>
                  </div>
                  <div class="input-group">
                     <label class="input-group-text" for="selectPoster"
                        ><i class="fa-solid fa-image"></i
                     ></label>
                     <input
                        type="file"
                        class="form-control"
                        aria-describedby="inputGroupFileAddon04"
                        aria-label="Upload"
                        id="image_uploads"
                        accept=".jpg, .jpeg, .png"
                        multiple
                        required
                        name="poster"
                     />
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-md-6">
                        <div class="input-group my-3">
                           <span class="input-group-text"
                              ><i class="fa-solid fa-explosion"></i
                           ></span>
                           <div class="form-floating">
                              <select
                                 class="form-select"
                                 aria-label="Default select example"
                                 required
                                 name="id_genero"
                              >
                                 <option value="" selected>
                                    Seleccione un genero
                                 </option>
                                 <?php 
                                    $query_genero = "SELECT * FROM genero;";
                                    $result_generos = mysqli_query($conexion, $query_genero);
                                    while ($generos = mysqli_fetch_array($result_generos)) {
                                 ?>
                                    <option value="<?= $generos['id_genero'] ?>"><?= $generos['nombre_genero'] ?></option>
                                 <?php } ?>
                              </select>
                              <label>Genero del juego</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6">
                        <div class="input-group my-3">
                           <span class="input-group-text"
                              ><i class="fa-solid fa-user"></i
                           ></span>
                           <div class="form-floating">
                              <select
                                 class="form-select"
                                 aria-label="Default select example"
                                 required
                                 name="id_compania"
                              >
                                 <option value="" selected>
                                    Seleccione la compañia
                                 </option>
                                 <?php  
                                    $query_companias = "SELECT * FROM compania;";
                                    $result_companias = mysqli_query($conexion, $query_companias);
                                    while ($compania = mysqli_fetch_array($result_companias)) {
                                 ?>
                                    <option value="<?= $compania['id_compania'] ?>"><?=  $compania['nombre_compania'] ?></option>
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
                              <i class="fa-solid fa-clock"></i
                           ></span>
                           <div class="form-floating">
                              <input
                                 type="number"
                                 class="form-control"
                                 id="input_duracion"
                                 placeholder="Cantidad en minutos"
                                 name="duracion"
                                 required
                              />
                              <label for="input_duracion">Duracion</label>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-4">
                        <div class="input-group mb-3">
                           <span class="input-group-text"
                              ><i class="fa-solid fa-calendar-days"></i
                           ></span>
                           <div class="form-floating">
                              <input
                                 type="number"
                                 class="form-control"
                                 id="input_anio"
                                 placeholder="Año"
                                 required
                                 name="estreno"
                              />
                              <label for="input_anio">Fecha de salida</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4">
                        <div class="input-group mb-3">
                           <span class="input-group-text">$</span>
                           <div class="form-floating">
                              <input
                                 type="number"
                                 class="form-control"
                                 id="input_recaudacion"
                                 placeholder="Recaudacion en $"
                                 required
                                 name="recaudacion"
                              />
                              <label for="input_recaudacion">Recaudacion</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-4">
                        <div class="input-group mb-3">
                           <span class="input-group-text">$</span>
                           <div class="form-floating">
                              <input
                                 min="1" max="5"
                                 type="number"
                                 class="form-control"
                                 id="input_puntuacion"
                                 placeholder="Puntacion"
                                 required
                                 name="puntuacion"
                              />
                              <label for="input_puntuacion">puntuacion</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-floating">
                     <textarea
                        class="form-control"
                        placeholder="Leave a comment here"
                        id="floatingTextarea2"
                        style="height: 100px"
                        required
                        name="sinopsis"
                     ></textarea>
                     <label for="floatingTextarea2"
                        >Sinopsis del juego</label
                     >
                  </div>
                  <div class="d-grid gap-2 mt-3">
                     <button
                        class="btn btn-success btn-lg"
                        type="submit"
                        name="crear_juego"
                        value ="ok"
                     >
                        Crear
                     </button>
                  </div>
               </form>
            </div>
            <div class="col-sm-12 col-md-6">
               <div class="container" id="preview" width="500" height="500">
                  <p>Seleccione la portada</p>
               </div>
            </div>
         </div>
      </div>

<?php include('../footer.php'); ?>