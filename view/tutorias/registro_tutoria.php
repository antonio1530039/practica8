<?php
  $controller_tutoria = new MVC();

  $controller_tutoria->verificarLoginController();

  $controller_tutoria->registroTutoriaController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de tutoria</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Registro de tutoria</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=sesion_tutoria'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            <p>
              <label>Alumno</label>
              <select name="alumno" required="" class="select2">
                  <?php
                    if(isset($_SESSION['maestro_info'])){
                      $controller_tutoria->getSelectForMaestrosTutoria($_SESSION['maestro_info']['numero_empleado']);
                      }
                    
                  ?>
              </select>
            </p>
          <p>
              <label>Maestro (tutor)</label>
               <input type="text" readonly="true" name="maestro" placeholder="Maestro" required="" value="<?php echo $_SESSION['maestro_info']['numero_empleado']; ?>">
            </p>
           <p>
             <label>Tipo de tutoria</label>
             <select name="tipo_tutoria" requiered="">
               <option value="Individual">Individual</option>
               <option value="Grupal">Grupal</option>
             </select>
          </p>
          <p>
            <label>Fecha</label>
             <input type="date" name="fecha" placeholder="fecha" required="">
          </p>
          <p>
            <label>Hora</label>
             <input type="time" name="hora" placeholder="Hora" required="">
          </p>
          <p>
            <label>Tema(s) de tutoria</label>
            <textarea rows="4" cols="50" name="tutoria_informacion" requiered=""></textarea>
          </p>
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;">
        </div>
      </div>
    </div>
    </form>
  </body>
  </html>
