<?php

	require_once("model/crud.php");
	require_once("controller/controller.php");

	$controller = new MVC();

	if($_GET['tipo']=='alumnos'){
		$pos = "matricula";
	}else if($_GET['tipo']=="maestros"){
		$pos = "numero_empleado";
	}else{
		$pos = "id";
	}

	$controller->borrarController($_GET[$pos],$_GET['tipo']);

?>