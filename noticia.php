<?php

require_once "autoloading.php";
$cronos = new cronos;
$id = $_GET["id"];
echo json_encode($cronos->getNoticia($id));