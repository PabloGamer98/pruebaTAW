<?php  

//invoca al controlador y modelo solicitado
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/carrerasModel.php";
require_once "models/materiasModel.php";

require_once "controllers/controller.php";
require_once "controllers/carrerasController.php";
require_once "controllers/MateriasController.php";

//se crea un nuevo controlador llamando a la plantilla que se mostrara al usuario
$mvc = new MvcController();
$mvc->plantilla();



?>