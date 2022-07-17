<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require('../model/Calculadora.php');
require('../model/CalculadoraRepository.php');
require('../view/VistaConsulta.php');

$id = $_POST['id'];
$calcRepo = new CalculadoraRepository();
$resultados = $calcRepo->obtenerPorId($id);

echo json_encode($resultados);

/*
$vista = new VistaConsulta();
$html = $vista->render($resultados);
echo $html;
*/
