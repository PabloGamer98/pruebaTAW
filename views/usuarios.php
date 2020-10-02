<?php  
session_start();
	if(!$_SESSION['validar']){
		header('location:index.php?action=ingresar');
		exit();
	}
?>


<h1>USUARIOS</h1>

<table border="1">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>Carrera</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$vistaUsuario= new MvcController();
			$vistaUsuario->vistaUsuariosController();
			$vistaUsuario->borrarUsuariosController();
			
		 ?>
	</tbody>
</table>

<?php 
	if(isset($_GET['action'])){
		if($_GET['action']=="cambio"){
			echo "Cambio exitoso";
		}
	}
 ?>