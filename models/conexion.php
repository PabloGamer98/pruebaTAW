<?php  

class Conexion{
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica3_bd",'root','');
		return $link;
	}
}

?>