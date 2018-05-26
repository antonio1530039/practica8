<?php

	//se incluyen los archivos de enlaces, modelo y controlador
	require_once("controller/controller.php");
	require_once("model/enlaces.php");
	require_once("model/crud.php");

	//instancia de la clase MVC o controlador
	$controller = new MVC();
	//ejecucion del metodo showTemplate, muestra el template principal
	$controller->showTemplate();



?>