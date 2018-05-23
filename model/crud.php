<?php

require_once "conexion.php";

class Crud extends Conexion{
	
	public function ingresoUsuarioModel($email, $password){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM maestros WHERE email = :email and password = :password and deleted=0");
		$stmt->bindParam(":email", $email);
		$stmt->bindParam(":password",$password);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function vistaXTablaModel($table){
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE deleted=0");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	public function registroAlumnoModel($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO alumnos(matricula, nombre, carrera, tutor) VALUES(:matricula, :nombre, :carrera, :tutor)");
		$stmt->bindParam(":matricula", $data['matricula']);
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":carrera", $data['carrera']);
		$stmt->bindParam(":tutor", $data['tutor']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}
  public function registroTutoriaModel($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO sesion_tutoria(alumno, maestro, fecha, hora, tipo_tutoria, tutoria_informacion) VALUES(:alumno, :maestro, :fecha, :hora, :tipo_tutoria, :tutoria_informacion)");
		$stmt->bindParam(":alumno", $data['alumno']);
		$stmt->bindParam(":maestro", $data['maestro']);
		$stmt->bindParam(":fecha", $data['fecha']);
		$stmt->bindParam(":hora", $data['hora']);
    $stmt->bindParam(":tipo_tutoria", $data['tipo']);
    $stmt->bindParam(":tutoria_informacion", $data['info']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}
  
	public function registroMaestroModel($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO maestros(numero_empleado, nombre, carrera, email, password, superadmin) VALUES(:numero, :nombre, :carrera, :correo, :password, :tipo)");
		$stmt->bindParam(":numero", $data['numero_empleado']);
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":carrera", $data['carrera']);
		$stmt->bindParam(":correo", $data['correo']);
		$stmt->bindParam(":password", $data['password']);
    $stmt->bindParam(":tipo", $data['superadmin']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}

	public function registroCarreraModel($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO carreras(nombre) VALUES(:nombre)");
		$stmt->bindParam(":nombre", $data['nombre']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}

	public function getRegModel($id, $table){
		if($table=="alumnos"){
			$idName = "matricula";
		}else if($table == "maestros"){
			$idName = "numero_empleado";
		}else if($table == "carreras"){
			$idName = "id";
		}
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $idName = :id and deleted = 0");
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function actualizarAlumnoModel($data, $id){
		$stmt = Conexion::conectar()->prepare("UPDATE alumnos SET nombre = :nombre, carrera = :carrera, tutor = :tutor WHERE matricula = '$id'");
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":carrera", $data['carrera']);
		$stmt->bindParam(":tutor", $data['tutor']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();


	}

	public function actualizarCarreraModel($data, $id){
		$stmt = Conexion::conectar()->prepare("UPDATE carreras SET nombre = :nombre WHERE id = $id");
		$stmt->bindParam(":nombre", $data['nombre']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();


	}

	public function actualizarMaestroModel($data, $id){
		$stmt = Conexion::conectar()->prepare("UPDATE maestros SET nombre = :nombre, carrera = :carrera, email = :correo, password = :password, superadmin = :tipo WHERE numero_empleado = '$id'");
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":carrera", $data['carrera']);
		$stmt->bindParam(":correo", $data['correo']);
		$stmt->bindParam(":password", $data['password']);
    $stmt->bindParam(":tipo", $data['superadmin']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();


	}

	public function borrarXModel($id, $table){
		if($table=="alumnos"){
			$idName = "matricula";
		}else if($table == "maestros"){
			$idName = "numero_empleado";
		}else if($table == "carreras" || $table == "sesion_tutoria"){
			$idName = "id";
		}
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET deleted=1 WHERE $idName = :id");
		$stmt->bindParam(":id",$id);
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

}



?>