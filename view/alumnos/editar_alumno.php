<?php
  $controller_alumnos = new MVC();
  
  $controller_alumnos->verificarLoginController();

  $controller_alumnos->actualizarAlumnoController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificacion de alumno</title>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Modificacion de alumno</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=alumnos'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
              <?php
                  $controller_alumnos->getAlumnoController();

              ?>
               <input type='submit' name='btn_actualizar' value='Guardar' class='button tiny success' style='float: right;' onclick="confirmar();">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  <script>
        function confirmar(){
          var x = confirm("Seguro que deseas guardar los datos?");
          if(!x)
            event.preventDefault();
        }


      </script>
  </html>
