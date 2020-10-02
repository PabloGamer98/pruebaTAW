<?php  

class carrerrasController{


	//metodo para registro de usuarios
public function registroCarreraController(){
        if(isset($_POST["carreraRegistro"])){
        	$datosController = array("nombre"=>$_POST["carreraRegistro"]);
            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = DatosCarrera::registroCarreraModel($datosController,"carreras");

            //Recibir la respuesta del modelo para saber que sucedios (success o error)

            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }else{
                header("location:index.php");
            }
        }
	}


	public function mostrarCarrerasController(){
		$respuesta=DatosCarrera::mostrarCarreraModel("carreras");
		foreach ($respuesta as $r) {?>
			<option><?php  echo $r['nombre'];?></option>
			
	<?php }
	}


	public function vistaCarreraController(){
		//envio al modelo la variable de control y la tabla a donde se hara la consulta
		$respuesta=DatosCarrera::vistaCarreraModel("carreras");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
				<td>'.$item["nombre"].'</td>

				<td><a href="index.php?action=editar&idCarreraEditar='.$item["id"].'"><button>Editar</button>
				<a href="index.php?action=carreras&idCarreraBorrar='.$item["id"].'"><button>Borrar</button></td>

				</tr>';
	}
}


	//metodo editar usuarios
	public function editarCarreraController(){
		//solicitar el id del usuario editar con get
		$datosController=$_GET['id'];
		//enviamos al modelo el id para hacer la consulta y obtener sus datos
		$respuesta = DatosCarrera::editarCarreraController($datosController,"carreras");

		//recibimos respuesta del modelo e imprimimos un form para editar
		echo "<input type='hidden' value=".$respuesta['id']." name='idEditar'>
              <input type='text' value=".$respuesta['nombre']." name='carreraEditar' required>";
	}



	//metodo para actualizar usuario
	public function actualizarCarreraController(){
		if(isset($_POST['carreraEditar'])){
			//preparamos un array con los id del form del controlador anterior para ejecutar la actualizacion de un modelo

			$datosController=array("id"=>$_POST["idEditar"],"usuario"=>$_POST["carreraEditar"]);

			//en viar el array al modelo que generara el update
			$respuesta=DatosCarrera::actualizarCarreraModel($datosController,"carreras");

			//recivimos respuesta del modelo para saber si se hiso el update o no

			if($respuesta=="success"){
				header("location:index.php?action=cambio");
			}else{
				echo "error";
			}
		}
	}





//borrado de usuario

	public function borrarCarreraController(){
		if(isset($_GET['idCarreraBorrar'])){
			$datosController=$_GET['idCarreraBorrar'];
			//mandar id al controlador para que ejecute el delete
			$respuesta=DatosCarrera::borrarCarreraModel($datosController,"carreras");

			//recibimos la respuesta del modelo
			if($respuesta=="success"){
				header("location:index.php?action=carreras");
			}
		}
	}




















}





?>