<?php  
	session_start();

	if(!$_SESSION['validar']){
		header('location:index.php?action=ingresar');
		exit();
	}

?>


<h1>Editar Usuario</h1>

<form>
	
	<?php 
	
	$editar= new MvcController();
	$editar->editarUsuariosController();
	$editar->actualizarUsuariosController();
?>

</form>