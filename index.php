<?php 
require_once("controller/Controller.php");
// create controller class instance
$controller = new Controller;
// load the index method to view home page
$controller->index();
?>