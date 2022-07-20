<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../model/Calculadora.php');
require('../model/CalculadoraRepository.php');
require('../view/Vista.php');


//Cuando se envia por CREAR la variable id viene vacio
//Cuando se envia por EDITAR la variable id viene llena
$id = isset($_POST['id']) ? $_POST['id'] : null;
$calc = new Calculadora($id,$_POST['numeroA'],$_POST['numeroB'],$_POST['operacion']);
$calcRepo = new CalculadoraRepository();
$guardoBD = $calcRepo->guardar($calc);
if($guardoBD){
    $mensajes = [
        'icon'=>'success',
        'title'=>'Registro guardado con exito, resultado: '.$calc->operacion
    ];
}else{
    $mensajes = [
        'icon'=>'error',
        'title'=>'No fue posible guardar el registro'
    ];
}
echo json_encode($mensajes);



