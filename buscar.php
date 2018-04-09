<?php
require 'config/config.php';

$res = array();
$res['res'] = "no";

$persona = mysqli_real_escape_string($link, $_POST["nombre"]);
$sql = "SELECT * FROM datos WHERE nombre LIKE '%".$persona."%'";
$rs = mysqli_query($link, $sql);

if(!$rs){
	$res['msj'] = "Error al buscar";
}else{
	$res['res'] = "si";
	$res['msj'] = "Busqueda exitosa";
}

echo json_encode($res);

?>