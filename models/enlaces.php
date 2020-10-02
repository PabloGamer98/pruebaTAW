<?php 


class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "carreras" || $enlaces == "materias" || $enlaces == "registroCarrera" || $enlaces == "registroMateria" ||  $enlaces == "salir"){
			$module =  "views/".$enlaces.".php";
		}else if($enlaces == "index"){
			$module =  "views/registro.php";
		}
		///
		else if($enlaces == "ok"){
			$module =  "views/registro.php";
		}else if($enlaces == "okCarrera"){
			$module =  "views/carreras.php";
		}else if($enlaces == "okMateria"){
			$module =  "views/materias.php";
		}

		else if($enlaces == "fallo"){
			$module =  "views/ingresar.php";	
		}

		else if($enlaces == "cambio"){
			$module =  "views/usuarios.php";		
		}
		else{
			$module =  "views/registro.php";
		}
		
		return $module;
	}

}

?>