   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="view/assets/css/foundation.css" />
    <script src="view/assets/js/vendor/modernizr.js"></script>


    <!-- DataTables 
        <link href="view/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Datatable js 
       <script src="view/assets/plugins/datatables/jquery.dataTables.min.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.bootstrap.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.buttons.min.js"></script>
       <script src="view/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
       <script src="view/assets/plugins/datatables/jszip.min.js"></script>
       <script src="view/assets/plugins/datatables/pdfmake.min.js"></script>
       <script src="view/assets/plugins/datatables/vfs_fonts.js"></script>
       <script src="view/assets/plugins/datatables/buttons.html5.min.js"></script>
       <script src="view/assets/plugins/datatables/buttons.print.min.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.responsive.min.js"></script>
       <script src="view/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.scroller.min.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.colVis.js"></script>
       <script src="view/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>
      <!-- init 
         <script src="view/assets/pages/jquery.datatables.init.js"></script>
        <!-- App Js 
        <script src="view/assets/js/jquery.app.js"></script>
<script src="view/assets/js/jquery-2.1.4.min.js"></script>
       <script src="view/assets/js/bootstrap.min.js"></script>
       <script src="view/assets/js/metisMenu.min.js"></script>
       <script src="view/assets/js/jquery.slimscroll.min.js"></script>
-->
<div class="row">
    
      <div >
        <!--ul class="right button-group">
          <li><a href="index.php" class="button tiny">Inicio</a></li>
          <li><a href="index.php?action=alumnos" class="button tiny">Gestion de Alumnos</a></li>
          <li><a href="index.php?action=maestros" class="button tiny">Gestion de Maestros</a></li>
          <li><a href="index.php?action=carreras" class="button tiny">Gestion de Carreras</a></li>
          <li><a href="index.php?action=sesion_tutoria" class="button tiny">Sesion de Tutoria</a></li>
          <li><a href="index.php?action=logout" class="button tiny" style="background-color:red">Log out</a></li>
        </ul-->
        <?php 
          $navC = new MVC();
          $navC->showNav();
        ?>
      </div>
    </div>