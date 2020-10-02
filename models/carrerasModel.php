<?php  
	//modelo que permite mostrar el enlace de las paginas con las vistas
require_once "conexion.php";
class DatosCarrera extends Conexion{
	
	public function registroCarreraModel($datosModel,$tabla){
		//preparar el modelo para hacer los inserts en la bd
		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre)");
		//prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute

		$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		//cerrar las funciones de las sentencia de pdo
		$stmt->close();


	}


//metodo para mostrar las materias en el select de registro del usuario
	public function mostrarCarreraModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetchAll();
		//cerramos pdo
		$stmt->close();
	}


	//metodo para vista usuarios (TABLA)

	public function vistaCarreraModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetchAll();
		//cerramos pdo
		$stmt->close();
	}

	//metodo para editar usuarios
	public function editarCarreraController($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id", $datosModel,PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}


//metodo para actualizar usuarios
	public function actualizarCarreraModel($datosModel,$tabla)
	{
		//preparar el query
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre WHERE id=:id");
		//ejecutar el query
		$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);
		
		//preparar respuesta
		if($stmt->execute()){
			return "succes";
		}else{
			return "error";
		}
		//cerrar la conexion pdo
		$stmt->close();
	}


//borrar usuarios
	public function borrarCarreraModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
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