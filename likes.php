<?php
/* Alejandro */
require_once "autoloading.php";
$cronos = new cronos;
$id = $_GET["id"];
$operacion = $_GET["op"];
$data = $cronos->updateVotos($id,$operacion);

echo json_encode($data);