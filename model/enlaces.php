<?php

class Enlaces{
	public function enlacesPaginasModel($enlace){
		
		if($enlace == "maestros" || $enlace == "alumnos" || $enlace == "tutorias" || $enlace == "carreras"){
			$module = "view/$enlace/$enlace.php";
		}else if($enlace == "logout"){
			$module = "model/logout.php";
		}else if($enlace == "registro_alumno" || $enlace == "editar_alumno"){
			$module = "view/alumnos/$enlace.php";
		}else if($enlace == "borrar"){
			$module = "model/borrar.php";
		}else if($enlace == "registro_maestro" || $enlace == "editar_maestro"){
			$module = "view/maestros/$enlace.php";
		}else if($enlace == "registro_tutoria" || $enlace == "sesion_tutoria"){
      $module = "view/tutorias/$enlace.php";
    }else if($enlace == "reportes"){
      $module = "view/reportes/$enlace.php";
    }
    else if($enlace == "login"){
      $module = "view/login.php";
    }
    else if($enlace == "registro_carrera" || $enlace == "editar_carrera"){
			$module = "view/carreras/$enlace.php";
		}
		else{
			$module = "view/inicio.php";
		}
		return $module;
	}
}



?>