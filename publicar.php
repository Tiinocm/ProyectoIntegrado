<?php

require_once "autoloading.php";

$cronos = new cronos;

$cronos->publicarNoticia($_GET["id"]);

header("location: comunitario.php?pub=0");