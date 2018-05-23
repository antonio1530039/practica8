<?php
  $controller_reportes = new MVC();
  $controller_reportes->verificarLoginController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Reportes</title>

  </head>
  <body>
  <form method="post">
    

    <div class="row">
 
      <div>
        <h3>Reportes</h3>
        <table width="100%">
          <thead>
            <tr>
              <td>Selecciona el tipo de reporte</td>
              <td></td>
            </tr>
          </thead>
          <tbod>
            <tr>
              <td>
              <select name="query">
                <option value="alumnos">Alumnos</option>
                <option value="maestros">Mestros</option>
                <option value="sesion_tutoria">Sesiones de Tutoria</option>
              </select>
              </td>
              <td>
                     <input type="submit" name="btn_filtrar" value="Filtrar" class="button tiny success">
              </td>
            </tr>
          </tbod>
        </table>
        
        <?php $controller_reportes->verReporteController(); ?>
        

      </div>
        <div>
          
        </div>
      </div>
    </div>
    <script>
       $(document).ready(function() {
            $('#tabla_reportes').DataTable();
        } );
     
    </script>
        </form>
