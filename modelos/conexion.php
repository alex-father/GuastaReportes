<?php

class Conexion{

	public function conectar(){

		/* instanciamos un objeto de la clase PDO que es mas segura */
		
		$link = new PDO("mysql:host=localhost:3306;dbname=dbmuni",
			            "root",
			            "");
		/* Validamos la informacion que viene en la variable $link con el metodo exec para que todos los caracteres latinos los recibamos sin problemas */
		
		$link->exec("set names utf8");

		return $link;

	}

}