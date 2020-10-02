<?php  
session_start();
	if(!$_SESSION['validar']){
		header('location:index.php?action=ingresar');
		exit();
	}
?>


<h1>Materias</h1><a href="index.php?action=registroMateria"><button>Registrar Materia</button></a>

<table border="1">
	<thead>
		<tr>
			<th>Materia</th>
			<th>Clave</th>
			<th>Carrera</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$vistaCarreras= new materiasController();
			$vistaCarreras->vistaMateriaController();
			$vistaCarreras->borrarMateriaController();
			
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