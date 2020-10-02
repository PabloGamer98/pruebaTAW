<h1>Registro de Carreras</h1>
<form method="POST">
	<input type="text" name="carreraRegistro" placeholder="Carrera" required>
	<input type="submit" value="Enviar">
</form>

<?php  

	$registro= new carrerrasController();
	$registro->registroCarreraController();

	//verificar la url correcta
	if(isset($_GET['action'])){
		if($_GET['action']=="okCarrera"){
			echo "Registro Exitoso";
		}
	}


?>