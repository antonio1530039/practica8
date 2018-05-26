   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="view/assets/css/foundation.css" />
    <script src="view/assets/js/vendor/modernizr.js"></script>


    
<div class="row">
    
      <div >
        <?php 
          //instancia de la clase controlador
          $navC = new MVC();
          //ejecucion del metodo showNav que en base al tipo de usuario logueado se muestra el menu correspondiente a su tipo
          $navC->showNav();
        ?>
      </div>
    </div>