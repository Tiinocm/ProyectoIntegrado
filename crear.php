<?php

$cronos = new cronos;
$cronos->insertNoticia();

echo json_encode($_POST);