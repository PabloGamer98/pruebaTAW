<!DOCTYPE html>
<html>
<head>
	<title>Practica no. 03</title>

	<style>
        body{
            padding: 0;
            margin: 0;
        }
		header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
            }
            
            nav{
                position:relative;
                margin:auto;
                width:100%;
                height:auto;
                background:black;
            }

            nav ul{
                position:relative;
                margin:auto;
                width:50%;
                text-align: center;
            }

            nav ul li{
                display:inline-block;
                width:10%;
                line-height: 50px;
                list-style: none;
            }

            nav ul li a{
                color:white;
                text-decoration: none;
            }

            section{
                position:relative;
                padding:20px;
            }
	</style>

</head>
<body>


	<header>
		<h1>BIENVENIDOS A LA PRACTICA N° 3</h1>
	</header>

	<?php  
		//incluir el menu de navegacion
		include "navegacion.php";
	?>

	<section>
		<!-- contenedor donde se muestran las opciones del sistema-->

		<?php  
			//mostrar opciones
			$mvc = new MvcController();
			$mvc->enlacesPaginasController();
		?>
	</section>

	
</body>
</html>