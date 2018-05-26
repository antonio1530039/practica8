<?php

  //instancia de la clase controlador
  $controller_tutoria = new MVC();
  //se verifica que se haya iniciado sesion
  $controller_tutoria->verificarLoginController();
  //registro de tutoria
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
        <p>
          Por favor, ingrese la siguiente información
        </p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=sesion_tutoria'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
            <p>
              <label>Seleccione el alumno(s) que desee agregar y de clic en Añadir alumno a sesion</label>
              <select name="alumno" required="" id="alumno" class="select2" >
                  <?php
                    if(isset($_SESSION['maestro_info'])){
                      //se muestran los alumnos tutorados del tutor
                      $controller_tutoria->getSelectForMaestrosTutoria($_SESSION['maestro_info']['numero_empleado']);

                      }
                    
                  ?>
              </select>
            </p>
          <input type="button" value="Añadir alumno a sesion" class="button tiny warning" style="float: right;" onclick="addAlumno()">
          
          <div id="contenedor">
            <table width="100%" id="alumnos" style="background-color:orange">
              <thead>
                <tr>
                  <td>Matriculas de alumnos en esta sesión de tutoría</td>
                </tr>
              </thead>
            </table>
          </div>
          <p>
              <label>Maestro (tutor)</label>
               <input type="text" readonly="true" name="maestro" placeholder="Maestro" required="" value="<?php echo $_SESSION['maestro_info']['numero_empleado']; ?>">
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
               <input type="submit" name="btn_agregar" value="Registrar" class="button tiny success" style="float: right;" onclick="verificarNumero()">
        </div>
      </div>
    </div>
    <script type="text/javascript">
      //script necesario para registrar varios alumnos a una sesion de tutoria
  var contador = 0;
  var alumnosEnLista = [];
  var tabla = document.getElementById("alumnos");
  
  //Funcion que verifica si un alumno existe en la lista de alumnos en tutoria
  function checkAlumno(al){
    for(var i = 0; i < alumnosEnLista.length; i++){
      if(alumnosEnLista[i] == al ){
        return true;
      }
    }
    return false;
  }
  
  //Funcion que agrega el alumno seleccionado a la vista de la sesion de tutoria
  function addAlumno(){
    //Verificar que se haya seleccionado un alumno en el select
    var select = document.getElementById("alumno").value;
    if(select!=""){
      //verificar que el alumno añadido a la tabla no exista ya en esta
      if(!checkAlumno(select)){

        alumnosEnLista.push(select);
        //Crear los elementos para mostrar los datos en la tabla
        var tx_matricula = document.createElement("input");
        tx_matricula.setAttribute("name","matricula"+contador);
        tx_matricula.setAttribute("readonly","true");
        tx_matricula.value = select;
        //mostrar la caja de texto con la matricula del alumno
        tabla.appendChild(tx_matricula);
        contador++;
        
        //alumnos_datos[0][]
        
      }else{
        alert("El alumno seleccionado ya se encuentra en la lista");
      }
    }
  }
  
  //funcion que revisa que al menos se haya agregado un alumno a la sesion de tutoria actual
  function verificarNumero(){
    if(contador==0){
      alert("Agrega al menos un alumno a la sesión de tutoria actual");
      event.preventDefault();
    }
      
  }
  
</script>
    </form>
  </body>
  </html>
