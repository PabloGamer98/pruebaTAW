<?php  
	//modelo que permite mostrar el enlace de las paginas con las vistas
require_once "conexion.php";
class Datos extends Conexion{
	
	public function registroUsuarioModel($datosModel,$tabla){
		//preparar el modelo para hacer los inserts en la bd

		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(usuario,password,email,id_carrera) VALUES(:usuario,:password,:email,(SELECT id FROM carreras WHERE nombre=:carrera))");
		//prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute

		$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
		$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_STR);
		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		//cerrar las funciones de las sentencia de pdo
		$stmt->close();


	}



//metodo ingreso usuario
	public function ingresoUsuariosModel($datosModel,$tabla){
		//preparamos el pdo
		$stmt=Conexion::conectar()->prepare("SELECT usuario,email,password FROM $tabla WHERE  usuario = :usuario");
		//Recibimos el valor desde el array
		$stmt->bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
		$stmt->execute();

		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetch();
		//cerramos pdo
		$stmt->close();
	}


	//metodo para vista usuarios (TABLA)

	public function vistaUsuariosModel($tabla,$tabla2){
		$stmt=Conexion::conectar()->prepare("SELECT $tabla.id,$tabla.usuario,$tabla.password,$tabla.email,$tabla2.nombre FROM $tabla INNER JOIN $tabla2 ON $tabla2.id=$tabla.id_carrera");
		$stmt->execute();
		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetchAll();
		//cerramos pdo
		$stmt->close();
	}

	//metodo para editar usuarios
	public function editarUsuariosModel($datosModel,$tabla,$tabla2){
		$stmt=Conexion::conectar()->prepare("SELECT $tabla.id,$tabla.usuario,$tabla.password,$tabla.email,$tabla2.nombre FROM $tabla INNER JOIN $tabla2 ON $tabla2.id=$tabla.id_carrera WHERE $tabla.id=:id");
		$stmt->bindParam(":id", $datosModel,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}


//metodo para actualizar usuarios
	public function actualizarUsuariosModel($datosModel,$tabla)
	{
		echo $datosModel["usuario"];
		echo $datosModel["id_carrera"];
		echo $datosModel["id"];

	}


//borrar usuarios
	public function borrarUsuariosModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id",$datosModel,PDO::PARAM_STR);
	
		if($stmt->execute()){
			return "succes";
		}else{
			return "error";
		}
		//cerrar la conexion pdo
		$stmt->close();

	}






}

?>