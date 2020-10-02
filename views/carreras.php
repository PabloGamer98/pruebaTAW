<?php  
session_start();
	if(!$_SESSION['validar']){
		header('location:index.php?action=ingresar');
		exit();
	}
?>


<h1>Carreras</h1><a href="index.php?action=registroCarrera"><button>Registrar Carrera</button></a>

<table border="1">
	<thead>
		<tr>
			<th>CARRERA</th>
			<th>ACCION</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$vistaCarreras= new carrerrasController();
			$vistaCarreras->vistaCarreraController();
			$vistaCarreras->borrarCarreraController();
			
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