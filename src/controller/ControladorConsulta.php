<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require('../model/Calculadora.php');
require('../model/CalculadoraRepository.php');
require('../view/VistaConsulta.php');


$calcRepo = new CalculadoraRepository();
$resultados = $calcRepo->obtenerTodo();

$vista = new VistaConsulta();
$html = $vista->render($resultados);

echo $html;
