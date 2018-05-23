<?php
  require_once('model/crud.php');
  require_once "controller/controller.php";
  $ingresarUsuario = new MVC();
  $ingresarUsuario->ingresoUsuarioController();
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
   <!-- <link rel="stylesheet" href="view/assets/css/foundation.css" />
    <script src="view/assets/js/vendor/modernizr.js"></script> -->
  </head>
  <body>
    <?php
    ?>
    <Center>
     <form method="post" action="">
    <div class="row">
      <div>

        <center><h1><img src="view/assets/img/upv_logo.png" width="200" height="200"/></h1></center>
        <h3>Sistema de Control de Tutorias UPV</h3>
        <p>Inicie sesion para continuar</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content">
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