<h1>Ingresar</h1>
<form method="POST">
	<input type="text" name="usuarioIngreso" placeholder="Usuario" required>
	<input type="password" name="passwordIngreso" placeholder="Contraseña" required>
	<input type="submit" value="Enviar">
</form>

<?php  

	$ingreso= new MvcController();
	$ingreso->ingresoUsuariosController();

	//verificar la url correcta
	if(isset($_GET['action'])){
		if($_GET['action']=="fallo"){
			echo "Fallo al ingresar";
		}
	}


?>