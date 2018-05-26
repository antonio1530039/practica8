<?php

  //instancia de la clase controlador
  $controller_alumnos = new MVC();
  //verificar si el usuario inicio sesion antes
  $controller_alumnos->verificarLoginController();
  //registro de alumno al presionar el boton de registrar
  $controller_alumnos->registroAlumnoController();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de alumno</title>

  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Registro de alumno</h3>
        <p>
          Por favor, ingrese la información que se pide a continuación
        </p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=alumnos'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            <p>
              <label>Matricula</label>
              <input type="text" name="matricula" placeholder="Matricula" required="">
            </p>

            <p>
              <label>Nombre</label>
              <input type="text" name="nombre" placeholder="Nombre" required="">
            </p>
            <p>
              <label>Carrera</label>
              <select name="carrera" required="" class="select2">
                  <?php
                    //se muestra el select de las carreras
                    $controller_alumnos->getSelectForCarreras("");
                  ?>
              </select>
            </p>
            <p>
              <label>Tutor</label>
              <select name="tutor" required="" class="form-control select2">
                  <?php
                    //se muestra el select de los maestros
                    $controller_alumnos->getSelectForMaestros("");
                  ?>
              </select>
            </p>
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;">
            
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
