<?php

class MVC{
	public function showTemplate(){
		include "view/template.php";
	}

	public function enlacePaginasController(){
		if(isset($_GET['action'])){
			$enlace = $_GET['action'];
		}else{
			$enlace = 'index';
		}
		//peticion al modelo
		$peticion = Enlaces::enlacesPaginasModel($enlace);

		include $peticion;
	}

	public function verificarLoginController(){
		session_start();
		if($_SESSION){
			if(!$_SESSION['login'])
				header("view/login.php");
		}else{
			header("Location: view/login.php");
		}

	}

	public function ingresoUsuarioController(){
		if(isset($_POST['correo']) && isset($_POST['password'])){
			$resultado = Crud::ingresoUsuarioModel($_POST['correo'], $_POST['password']);

			if(!empty($resultado)){
				session_start();
				$_SESSION['login']=true;
				$_SESSION['maestro_info']= $resultado;
				header("Location: ../index.php");
			}else{
				echo "<script>alert('Email o password incorrectos');</script>";
			}
		}
	}

	public function mostrarInicioController(){
		if(isset($_SESSION['maestro_info'])){
			echo "<center><h2>Bienvenido ".$_SESSION['maestro_info']['nombre']."</h2></center>";
		}
	}


	public function getAlumnosController(){
		$informacion = Crud::vistaXTablaModel("alumnos");
		if(!empty($informacion)){
			foreach ($informacion as $row => $item) {
				$carrera = Crud::getRegModel($item['carrera'],"carreras");
				$tutor = Crud::getRegModel($item['tutor'],"maestros");
				echo "<tr>";
				echo "<td>".$item['matricula']."</td>";
				echo "<td>".$item['nombre']."</td>";
				echo "<td>".$carrera['nombre']."</td>";
				echo "<td>".$tutor['nombre']."</td>";
				echo "<td>"."<a href=index.php?action=editar_alumno&matricula=".$item['matricula']." class='button radius tiny secondary'>Ver detalles</a></td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=alumnos&matricula=".$item['matricula']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";

			}
		}
		
	}

	public function getMaestrosController(){
		$informacion = Crud::vistaXTablaModel("maestros");
		if(!empty($informacion)){
			foreach ($informacion as $row => $item) {
				$carrera = Crud::getRegModel($item['carrera'],"carreras");
				echo "<tr>";
				echo "<td>".$item['numero_empleado']."</td>";
				echo "<td>".$item['nombre']."</td>";
				echo "<td>".$carrera['nombre']."</td>";
				echo "<td>".$item['email']."</td>";
				echo "<td>"."<a href=index.php?action=editar_maestro&numero_empleado=".$item['numero_empleado']." class='button radius tiny secondary'>Ver detalles</a></td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=maestros&numero_empleado=".$item['numero_empleado']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";

			}
		}
	}
  
  public function getTutoriasMaestros(){
		$informacion = Crud::vistaXTablaModel("sesion_tutoria");
		if(!empty($informacion)){
			foreach ($informacion as $row => $item) {
        if($item['maestro'] == $_SESSION['maestro_info']['numero_empleado']){
          $alumno = Crud::getRegModel($item['alumno'],"alumnos");
        $maestro = Crud::getRegModel($item['maestro'],"maestros");
				echo "<tr>";
				echo "<td>".$item['id']."</td>";
				echo "<td>".$alumno['nombre']."</td>";
				echo "<td>".$maestro['nombre']."</td>";
				echo "<td>".$item['fecha']."</td>";
        echo "<td>".$item['hora']."</td>";
        echo "<td>".$item['tipo_tutoria']."</td>";
          echo "<td>".$item['tutoria_informacion']."</td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=sesion_tutoria&id=".$item['id']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";
        echo "</tr>";
        }
				
			}
		}
	}

	public function getCarrerasController(){
		$informacion = Crud::vistaXTablaModel("carreras");
		if(!empty($informacion)){
			foreach ($informacion as $row => $item) {
				echo "<tr>";
				echo "<td>".$item['id']."</td>";
				echo "<td>".$item['nombre']."</td>";
				echo "<td>"."<a href=index.php?action=editar_carrera&id=".$item['id']." class='button radius tiny secondary'>Ver detalles</a></td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=carreras&id=".$item['id']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";

			}
		}
		
	}

	public function getSelectForMaestros($firstID){
		$informacion = Crud::vistaXTablaModel("maestros");
		if(!empty($informacion)){
			if($firstID == ""){
				foreach ($informacion as $row => $item) {
					echo "<option value='".$item['numero_empleado']."'>".$item['nombre']."</option>";
				}
			}else{
				//Get information of carrera
				$maestro = Crud::getRegModel($firstID, "maestros");
				echo "<option value='".$maestro['numero_empleado']."'>".$maestro['nombre']."</option>";
				foreach ($informacion as $row => $item) {
					if($item['numero_empleado']!=$firstID)
						echo "<option value='".$item['numero_empleado']."'>".$item['nombre']."</option>";
				}
			}
			
		}
	}

	public function getSelectForCarreras($index){
		$informacion = Crud::vistaXTablaModel("carreras");
		if(!empty($informacion)){
			if($index==""){
				foreach ($informacion as $row => $item) {
					echo "<option value='".$item['id']."'>".$item['nombre']."</option>";
				}
			}else{
				//Get information of carrera
				$carrera = Crud::getRegModel($index, "carreras");
				echo "<option value='".$carrera['id']."'>".$carrera['nombre']."</option>";
				foreach ($informacion as $row => $item) {
					if($item['id']!=$index){
						echo "<option value='".$item['id']."'>".$item['nombre']."</option>";
					}
				}
			}
			
		}

	}
  public function getSelectForMaestrosTutoria($numero_maestro){
		$informacion = Crud::vistaXTablaModel("alumnos");
		if(!empty($informacion)){
				foreach ($informacion as $row => $item) {
          if($item['tutor'] == $numero_maestro){
            $carrera_alumno = Crud::getRegModel($item['carrera'], "carreras");
            echo "<option value='".$item['matricula']."'>".$item['matricula']. " | ". $item['nombre'] . " | ".$carrera_alumno['nombre'] . "</option>";
          }
            
				}
			}else{
        echo "<center><h3>No tiene asignado ningun alumno</h3></center>";
    }
	}

	public function getRegController($id, $table){

	}

	public function registroAlumnoController(){
		if(isset($_POST['btn_agregar'])){
			$data = array('matricula'=> $_POST['matricula'],
						'nombre'=> $_POST['nombre'],
						'carrera'=> $_POST['carrera'],
						'tutor'=> $_POST['tutor']
					);
			$registro = Crud::registroAlumnoModel($data);
			if($registro == "success"){
				header("Location: index.php?action=alumnos");
			}else{
				echo "<script>alert('Error al registrar... verifica que la matricula ingresada no exista en un registro de un alumno en le base de datos')</script>";
			}
		}
	}

	public function registroMaestroController(){
		if(isset($_POST['btn_agregar'])){
			$data = array('numero_empleado'=> $_POST['numero_empleado'],
						'nombre'=> $_POST['nombre'],
						'carrera'=> $_POST['carrera'],
						'correo'=> $_POST['correo'],
						'password'=> $_POST['password'],
					);
			$registro = Crud::registroMaestroModel($data);
			if($registro == "success"){
				header("Location: index.php?action=maestros");
			}else{
				echo "<script>alert('Error al registrar... Verifica que el numero de empleado que ingresaste no pertenezca a otro usuario')</script>";
			}
		}
	}
  
  public function registroTutoriaController(){
		if(isset($_POST['btn_agregar'])){
      $fecha = date('Y-m-d', strtotime($_POST['fecha']));
			$data = array('alumno'=> $_POST['alumno'],
						'tipo'=> $_POST['tipo_tutoria'],
						'fecha'=> $fecha,
             'hora'=> $_POST['hora'],
              'maestro'=> $_POST['maestro'],
              'info'=> $_POST['tutoria_informacion'],
					);
			$registro = Crud::registroTutoriaModel($data);
			if($registro == "success"){
				header("Location: index.php?action=sesion_tutoria");
			}else{
				echo "<script>alert('Error al registrar la sesion de tutoria')</script>";
			}
		}
	}

	public function registroCarreraController(){
		if(isset($_POST['btn_agregar'])){
			$data = array('nombre'=> $_POST['nombre']
					);
			$registro = Crud::registroCarreraModel($data);
			if($registro == "success"){
				header("Location: index.php?action=carreras");
			}else{
				echo "<script>alert('Error al registrar')</script>";
			}
		}
	}

	public function getAlumnoController(){
		$id = (isset($_GET['matricula'])) ? $_GET['matricula'] : "";
		$peticion = Crud::getRegModel($id, 'alumnos');
		if(!empty($peticion)){
			echo "<p>
              <label>Matricula</label>
              <input type='text' name='matricula' placeholder='Matricula' required='' value='".$peticion['matricula']."' readonly='true'>
            </p>";
            echo "<p>
              <label>Nombre</label>
              <input type='text' name='nombre' placeholder='Nombre' required='' value='".$peticion['nombre']."'>
            </p>";
            echo "<p>
              <label>Carrera</label>
              <select name='carrera' required='' class='select2'>
                  ";
            $this->getSelectForCarreras($peticion['carrera']);
            echo "
              </select>
            </p>";
            echo "<p>
              <label>Tutor</label>
              <select name='tutor' required='' class='select2'>
                  ";
            $this->getSelectForMaestros($peticion['tutor']);
            echo "
              </select>
            </p>";
		}
	}

	public function getMaestroController(){
		$id = (isset($_GET['numero_empleado'])) ? $_GET['numero_empleado'] : "";
		$peticion = Crud::getRegModel($id, 'maestros');
		if(!empty($peticion)){
			echo "<p>
              <label>Numero de Empleado</label>
              <input type='text' name='numero_empleado' placeholder='Numero de Empleado' required='' value='".$peticion['numero_empleado']."' readonly='true'>
            </p>";
            echo "<p>
              <label>Nombre</label>
              <input type='text' name='nombre' placeholder='Nombre' required='' value='".$peticion['nombre']."'>
            </p>";
            echo "<p>
              <label>Carrera</label>
              <select name='carrera' required='' class='select2'>
                  ";
            $this->getSelectForCarreras($peticion['carrera']);
            echo "
              </select>
            </p>";
            echo "<p>
              <label>Email</label>
              <input type='text' name='correo' placeholder='Correo' required='' value='".$peticion['email']."'>
            </p>";
            echo "<p>
              <label>Password</label>
              <input type='text' name='password' placeholder='Password' required='' value='".$peticion['password']."'>
            </p>";
           
		}else{
			header("Location: index.php?action=maestros");
		}
	}

	public function getCarreraController(){
		$id = (isset($_GET['id'])) ? $_GET['id'] : "";
		$peticion = Crud::getRegModel($id, 'carreras');
		if(!empty($peticion)){
			echo "<p>
              <label>Id</label>
              <input type='text' name='id' placeholder='Id' required='' value='".$peticion['id']."' readonly='true'>
            </p>";
            echo "<p>
              <label>Nombre</label>
              <input type='text' name='nombre' placeholder='Nombre' required='' value='".$peticion['nombre']."'>
            </p>";
		}else{
			header("Location: index.php?action=carreras");
		}
	}

	public function actualizarAlumnoController(){
		if(isset($_POST['btn_actualizar'])){
			$data = array(
				"nombre"=>$_POST['nombre'],
				"carrera"=>$_POST['carrera'],
				"tutor"=>$_POST['tutor']
			);

			//Model
			$peticion = Crud::actualizarAlumnoModel($data, $_POST['matricula']);
			if($peticion == "success"){
				header("Location: index.php?action=alumnos");
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}

	public function actualizarMaestroController(){
		if(isset($_POST['btn_actualizar'])){
			$data = array(
				"nombre"=>$_POST['nombre'],
				"carrera"=>$_POST['carrera'],
				"correo"=>$_POST['correo'],
				"password"=>$_POST['password']
			);

			//Model
			print_r($data);
			$peticion = Crud::actualizarMaestroModel($data, $_POST['numero_empleado']);
			if($peticion == "success"){
				header("Location: index.php?action=maestros");
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}

	public function actualizarCarreraController(){
		if(isset($_POST['btn_actualizar'])){
			$data = array(
				"nombre"=>$_POST['nombre']
			);

			//Model
			print_r($data);
			$peticion = Crud::actualizarCarreraModel($data, $_POST['id']);
			if($peticion == "success"){
				header("Location: index.php?action=carreras");
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}


	public function borrarController($id, $tabla){
		$peticion = Crud::borrarXModel($id, $tabla);
		if($peticion == "success"){
			header("Location: index.php?action=$tabla");
		}else{
			echo "<script>alert('Error al borrar')</script>";
		}
	}




}





?>