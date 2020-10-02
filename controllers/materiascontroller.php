<?php  

class materiasController{


	//metodo para registro de usuarios
	public function registroMateriaController(){
        if(isset($_POST["materiaRegistro"])){
        	$datosController = array("materia"=>$_POST["materiaRegistro"],
        		"clave"=>$_POST["claveRegistro"],
        		"carrera"=>$_POST["carreraRegistro"]);

        	$datosController['carrera'];
            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = DatosMateria::registroMateriaModel($datosController,"materias");

            //Recibir la respuesta del modelo para saber que sucedios (success o error)

            if($respuesta == "success"){
                header("location:index.php?action=okMateria");
            }else{
                header("location:index.php");
            }
        }else{
        	echo "no hay";
        }
	}




	public function vistaMateriaController(){
		//envio al modelo la variable de control y la tabla a donde se hara la consulta
		$respuesta=DatosMateria::vistaMateriaModel("materias");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
				<td>'.$item["materia"].'</td>
				<td>'.$item["clave"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=materiasEditar&idMateriaEditar='.$item["id"].'"><button>Editar</button>
				<td><a href="index.php?action=materias&idMateriaBorrar='.$item["id"].'"><button>Borrar</button></td>

				</tr>';
	}
}


	//metodo editar usuarios
	public function editarMateriaController(){
		//solicitar el id del usuario editar con get
		$datosController=$_GET['idMateriaEditar'];
		//enviamos al modelo el id para hacer la consulta y obtener sus datos
		$respuesta = DatosMateria::editarMateriaModel($datosController,"materias");

		//recibimos respuesta del modelo e imprimimos un form para editar
		echo "
			<input type='hidden' value=".$respuesta['id']." name='idEditar'>

			<input type='text' value=".$respuesta['nombre']." name='nombreEditar' required>
			<input type='text' value=".$respuesta['clave']." name='claveEditar' required>
			<input type='text' value=".$respuesta['carrera']." name='carreraEditar' required>";
	}



	//metodo para actualizar usuario
	public function actualizarMateriaController(){
		if(isset($_POST['carreraEditar'])){
			//preparamos un array con los id del form del controlador anterior para ejecutar la actualizacion de un modelo

			$datosController=array("id"=>$_POST["idEditar"],"nombre"=>$_POST["nombreEditar"],"clave"=>$_POST['claveEditar'],"carrera"=>$_POST['carreraEditar']);

			//en viar el array al modelo que generara el update
			$respuesta=DatosMateria::actualizarMateriaModel($datosController,"materias");

			//recivimos respuesta del modelo para saber si se hiso el update o no

			if($respuesta=="success"){
				header("location:index.php?action=cambio");
			}else{
				echo "error";
			}
		}
	}





//borrado de usuario

	public function borrarMateriaController(){
		if(isset($_GET['idMateriaBorrar'])){
			$datosController=$_GET['idMateriaBorrar'];
			//mandar id al controlador para que ejecute el delete
			$respuesta=DatosMateria::borrarMateriaModel($datosController,"materias");

			//recibimos la respuesta del modelo
			if($respuesta=="success"){
				header("location:index.php?action=materias");
			}
		}
	}





}





?>