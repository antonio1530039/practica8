<?php
//Clase de enlaces de pagina
class Enlaces{
	//metodo publico que dado un nombre de enlace, retorna el modulo que sera incluido o mostrado 
	public function enlacesPaginasModel($enlace){
		
		if($enlace == "maestros" && $_SESSION["maestro_info"]["superadmin"]==1 || $enlace == "alumnos" && $_SESSION["maestro_info"]["superadmin"]==1 || $enlace == "tutorias" || $enlace == "carreras" && $_SESSION["maestro_info"]["superadmin"]==1){
			$module = "view/$enlace/$enlace.php";
		}else if($enlace == "logout"){
			$module = "model/logout.php";
		}else if($enlace == "registro_alumno" && $_SESSION["maestro_info"]["superadmin"]==1 || $enlace == "editar_alumno" && $_SESSION["maestro_info"]["superadmin"]==1){
			$module = "view/alumnos/$enlace.php";
		}else if($enlace == "borrar"){
			$module = "model/borrar.php";
		}else if($enlace == "registro_maestro" && $_SESSION["maestro_info"]["superadmin"]==1 || $enlace == "editar_maestro" && $_SESSION["maestro_info"]["superadmin"]==1){
			$module = "view/maestros/$enlace.php";
		}else if($enlace == "registro_tutoria" || $enlace == "sesion_tutoria"){
      $module = "view/tutorias/$enlace.php";
    }else if($enlace == "reportes" && $_SESSION["maestro_info"]["superadmin"]==1){
      $module = "view/reportes/$enlace.php";
    }
    else if($enlace == "login"){
      $module = "view/login.php";
    }
    else if($enlace == "registro_carrera" && $_SESSION["maestro_info"]["superadmin"]==1 || $enlace == "editar_carrera" && $_SESSION["maestro_info"]["superadmin"]==1){
			$module = "view/carreras/$enlace.php";
		}else if($enlace== "ver_detalles"){
			$module = "view/tutorias/$enlace.php";
		}
		else{
			$module = "view/inicio.php";
		}
		return $module;
	}
}



?>