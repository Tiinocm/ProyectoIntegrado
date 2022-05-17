<?php

$cronos = new cronos;

$prueba = $cronos->insertNoticia();

echo json_encode($prueba);