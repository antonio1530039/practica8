<?php
//Clase de conexion con la BD
class Conexion{
	//funcion que se conecta mediante PDO a la base de datos indicada en el parametro
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica8","root","molina");
		return $link;
	}


}



?>