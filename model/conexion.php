<?php

class Conexion{

	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica8","root","molina");
		return $link;
	}


}



?>