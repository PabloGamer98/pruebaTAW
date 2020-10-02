<?php  

/**
 * 
 */
class MvcController
{
	//invocar a la plantilla template
	public function plantilla(){
		include "views/template.php";
	}

	//mostrar los nlaces de la pagina
	public function enlacesPaginasController(){
		if (isset($_GET['action'])) {
			$enlaces=$_GET['action'];
		}else{
			$enlaces="index";
		}
		$respuesta=Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	//metodo para registro de usuarios
public function registroUsuariosController(){
        if(isset($_POST["usuarioRegistro"])){
        	echo $_POST["carreraRegistro"];
        $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                    "password"=>$_POST["passwordRegistro"],
                                    "email"=>$_POST["emailRegistro"],
                                	"carrera"=>$_POST["carreraRegistro"]);
                //Enviamos los parametros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController,"alumnos");

                //Recibir la respuesta del modelo para saber que sucedios (success o error)

                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }
                else{
                    header("location:index.php");
                }
            }
	}


	public function ingresoUsuariosController(){
		if(isset($_POST["usuarioIngreso"])){
			$datosController=array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

			$respuesta=Datos::ingresoUsuariosModel($datosController,"alumnos");

			if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"]=true;

				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}



	public function vistaUsuariosController(){
		//envio al modelo la variable de control y la tabla a donde se hara la consulta
		$respuesta=Datos::vistaUsuariosModel("alumnos","carreras");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["nombre"].'</td>

				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button>
				<a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></td>

				</tr>';
	}
}


	//metodo editar usuarios
	public function editarUsuariosController(){
		//solicitar el id del usuario editar con get
		$datosController=$_GET['id'];
		//enviamos al modelo el id para hacer la consulta y obtener sus datos
		$respuesta = Datos::editarUsuariosModel($datosController,"alumnos","carreras");
		$select =Conexion::conectar()->prepare("SELECT * FROM carreras");
		$select->execute();
		//recibimos respuesta del modelo e imprimimos un form para editar
		echo "
			<input type='hidden' value=".$respuesta['id']." name='idEditar'>

			<input type='text' value=".$respuesta['usuario']." name='usuarioEditar' required>
			
			<input type='password' value=".$respuesta['password']." name='passwordEditar' required>

			<input type='email' value=".$respuesta['email']." name='emailEditar' required> 

			<select name='carreraEditar'>
			<option>Selecciona una carrera</option>";
			foreach ($select as $s) {
				echo "<option value=".$s['id'].">".$s['nombre']."</option>";
			}
		echo "</select>
		<input type='submit' value='Actualizar'>";
	}



	//metodo para actualizar usuario
	public function actualizarUsuariosController(){
		if(isset($_POST['usuarioEditar'])){
			//preparamos un array con los id del form del controlador anterior para ejecutar la actualizacion de un modelo

			$datosController=array("id"=>$_POST["idEditar"],
									"usuario"=>$_POST["usuarioEditar"],
									"password"=>$_POST["passwordEditar"],
									"email"=>$_POST["emailEditar"],
									"id_carrera"=>$_POST["carreraEditar"]);

			//en viar el array al modelo que generara el update
			$respuesta=Datos::actualizarUsuariosModel($datosController,"alumnos");

			//recivimos respuesta del modelo para saber si se hiso el update o no

			if($respuesta=="success"){
				header("location:index.php?action=cambio");
			}else{
				echo "error";
			}
		}
	}





//borrado de usuario

	public function borrarUsuariosController(){
		if(isset($_GET['idBorrar'])){
			$datosController=$_GET['idBorrar'];
			//mandar id al controlador para que ejecute el delete
			$respuesta=Datos::borrarUsuariosModel($datosController,"alumnos");

			//recibimos la respuesta del modelo
			if($respuesta=="success"){
				header("location:index.php?action=usuarios");
			}
		}
	}










}

?>