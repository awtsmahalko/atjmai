<?php
include '../core/config.php';

if(isset($_GET['uri'])){
	$uri = $_GET['uri'];

	$controller = new Controller();
	echo $controller->dispatch($uri);
}else{
	echo "URI not set";
}