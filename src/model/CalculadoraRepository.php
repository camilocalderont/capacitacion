<?php
require('Conexion.php');

class CalculadoraRepository{
    private $bd;
    private $calc;
    function __construct($calc=null) 
    {
        $this->bd   = Conexion::obtener();
        $this->calc = $calc;
    }  

    function guardar($calc)
    {
        $guardo = false;
        try{
            $sql = "INSERT INTO capacitacion.calculadora (numeroA,numeroB,operacion,resultado) 
                    VALUES (:numeroA, :numeroB, :operacion, :resultado)";
            $sentencia = $this->bd->prepare($sql);
            $sentencia->bindParam(':numeroA', $calc->numeroA);
            $sentencia->bindParam(':numeroB', $calc->numeroB);
            $sentencia->bindParam(':operacion', $calc->operacion);
            @$sentencia->bindParam(':resultado', $calc->calcular());    
            $sentencia->execute();   
            $guardo =  $sentencia->rowCount();
            return  $guardo;   
        }catch(Exception $e){
            echo '<pre>'.print_r($e,true) .'</pre>';
            return  $guardo; 
            //die();            
        }
    }

    function obtenerTodo()
    {
        $resultados = [];
        try{
            $sql = "SELECT * FROM capacitacion.calculadora";
            $sentencia = $this->bd->prepare($sql);  
            $sentencia->execute();   
            $resultados =  $sentencia->fetchAll(PDO::FETCH_ASSOC);;
            return  $resultados;   
        }catch(Exception $e){
            echo '<pre>'.print_r($e,true) .'</pre>';
            return  $resultados; 
            //die();            
        }        
    }

}