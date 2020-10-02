<?php  
	//modelo que permite mostrar el enlace de las paginas con las vistas
require_once "conexion.php";
class DatosMateria extends Conexion{
	
	public function registroMateriaModel($datosModel,$tabla){
		//preparar el modelo para hacer los inserts en la bd
		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(materia,clave,id_carrera) VALUES(:materia,:clave,(SELECT id FROM carreras WHERE nombre=:carrera))");
		//prepare prepara una sentencia sql para ser ejecutada por el metodo pdostatement::execute
		$stmt->bindParam(":materia",$datosModel["materia"],PDO::PARAM_STR);
		$stmt->bindParam(":clave",$datosModel["clave"],PDO::PARAM_STR);
		$stmt->bindParam(":carrera",$datosModel["carrera"],PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}
		//cerrar las funciones de las sentencia de pdo
		$stmt->close();


	}


	//metodo para vista usuarios (TABLA)

	public function vistaMateriaModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT materias.id,materias.materia, materias.clave,carreras.nombre FROM $tabla INNER JOIN carreras on carreras.id = materias.id");
		$stmt->execute();
		//retornamos el fetch que es el que obtiene una fila o posicion de un array
		return $stmt->fetchAll();
		//cerramos pdo
		$stmt->close();
	}

	//metodo para editar usuarios
	public function editarMateriaModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id", $datosModel,PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}


//metodo para actualizar usuarios
	public function actualizarMateriaModel($datosModel,$tabla)
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
	public function borrarMateriaModel($datosModel,$tabla){
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