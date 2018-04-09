<?php
include_once 'config/acciones.php';
$a = new Acciones();
$res = array();
$res["res"] = "no";
$a->nombre = $_POST['nombre'];
$a->tel = $_POST['tel'];
$rs = $a->insertar();

if(!$rs){
	$res["msj"] = "Error al insertar";
}else{
	$res["res"] = "si";
	$res["msj"] = "Registro exitoso";
}

echo json_encode($res);

?>