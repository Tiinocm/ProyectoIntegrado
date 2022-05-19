<?php

require_once "autoloading.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cronos = new cronos;

$cronos->publicarNoticia($_GET["id"]);

/* header("location: comunitario.php?pub=0"); */