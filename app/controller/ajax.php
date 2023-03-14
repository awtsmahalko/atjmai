<?php
include '../core/config.php';

$ClassName = $_REQUEST['q'];
$Method = $_REQUEST['m'];

$Intance = new $ClassName;
$Intance->inputs = $_POST;
$Intance->requests = $_REQUEST;
$Intance->files = $_FILES;
echo $Intance->$Method();
