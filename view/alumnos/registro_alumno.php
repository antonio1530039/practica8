<?php
  $controller_alumnos = new MVC();

  $controller_alumnos->verificarLoginController();

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
                    $controller_alumnos->getSelectForCarreras("");
                  ?>
              </select>
            </p>
            <p>
              <label>Tutor</label>
              <select name="tutor" required="" class="form-control select2">
                  <?php
                    $controller_alumnos->getSelectForMaestros("");
                  ?>
              </select>
            </p>
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
