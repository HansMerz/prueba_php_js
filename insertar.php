<?php
require 'config/config.php';
$res = array();
$res['res'] = "no";

$sql = "INSERT INTO datos VALUES(null, '". $_POST["nombre"] ."', '". $_POST["tel"] ."')";
$rs = mysqli_query($link, $sql);

if(!$rs){
	$res['msj'] = "Error al insertar";
}else{
	$res['res'] = "si";
	$res['msj'] = "Registro exitoso";
}

echo json_encode($res);

?>