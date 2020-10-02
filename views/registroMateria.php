<h1>Registro de Materias</h1>
<form method="POST">
	<input type="text" name="materiaRegistro" placeholder="Materia" required>
	<input type="text" name="claveRegistro" placeholder="Clave de la materia">
	<select name="carreraRegistro">
		<option>Asigna la materia a una carrera</option>
		<?php  
			$carreras= new carrerrasController();
			$carreras->mostrarCarrerasController();?>
	</select>
	<input type="submit" value="Enviar">
</form>

<?php  

	$registro= new materiasController();
	$registro->registroMateriaController();

	//verificar la url correcta
	if(isset($_GET['action'])){
		if($_GET['action']=="okCarrera"){
			echo "Registro Exitoso";
		}
	}


?>