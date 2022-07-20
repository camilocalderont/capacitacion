<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require('../model/Calculadora.php');
require('../model/CalculadoraRepository.php');
require('../view/VistaConsulta.php');

$id = $_POST['id'];
$calcRepo = new CalculadoraRepository();
$resultado = $calcRepo->eliminar($id);

if($resultado){
    $mensajes = [
        'icon'=>'success',
        'title'=>'Registro eliminado con exito'
    ];
}else{
    $mensajes = [
        'icon'=>'error',
        'title'=>'No fue posible eliminar el registro'
    ];
}
echo json_encode($mensajes);

/*
$vista = new VistaConsulta();
$html = $vista->render($resultados);
echo $html;
*/
