<?php

require_once "autoloading.php";

$security = new security();

$cronos = new cronos;

($security->isAdmin($security->getUserData())) ? $cronos->publicarNoticia($_GET["id"]) : "";

header("location: comunitario.php?pub=0");