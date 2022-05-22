<?php

require_once "autoloading.php";
$cronos = new cronos;
$id = $_GET["id"];
$data = $cronos->getNoticia($id);
$fecha = strtotime($data[0]["fecha"]);
$data[0]["fecha"] = date("j M Y", $fecha);

echo json_encode($data, true);