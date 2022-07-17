<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../model/Calculadora.php');
require('../model/CalculadoraRepository.php');
require('../view/Vista.php');

$id = isset($_POST['id']) ? $_POST['id'] : null;
$calc = new Calculadora($id,$_POST['numeroA'],$_POST['numeroB'],$_POST['operacion']);
$calcRepo = new CalculadoraRepository();
$guardoBD = $calcRepo->guardar($calc);
//$guardoBD = true;
//$resultado = $calc->calcular();
$vista = new Vista();
$html = $vista->render($calc,$guardoBD);


echo $html;
