<?php
  require_once('../model/crud.php');
  require_once "../controller/controller.php";
  $ingresarUsuario = new MVC();
  $ingresarUsuario->ingresoUsuarioController();
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/foundation.css" />
    <script src="assets/js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php
    ?>
    <Center>
     <form method="post" action="">
    <div class="row">
      <div>
        <h3>Login</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p>
                  <input type="text" name="correo" required="" placeholder="Email" required="">
                </p>
                <p>
                  <input type="text" name="password" required="" placeholder="Password" required="">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Iniciar sesion" class="button tiny success">
                </p>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    

    <?php require_once('footer.php'); ?>