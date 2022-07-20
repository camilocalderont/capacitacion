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
        if($calc->id != null){
            return $this->editar($calc);
        }else{
            return $this->crear($calc);
        }
    }

    function crear($calc)
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

    function editar($calc)
    {
        $guardo = false;
        try{
            $sql = "UPDATE capacitacion.calculadora SET 
                    numeroA = :numeroA, 
                    numeroB = :numeroB, 
                    operacion = :operacion,
                    resultado = :resultado 
                    WHERE id = :id";
            $sentencia = $this->bd->prepare($sql);
            $sentencia->bindParam(':numeroA', $calc->numeroA);
            $sentencia->bindParam(':numeroB', $calc->numeroB);
            $sentencia->bindParam(':operacion', $calc->operacion);
            @$sentencia->bindParam(':resultado', $calc->calcular());  
            $sentencia->bindParam(':id', $calc->id);  
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

    function obtenerPorId($id)
    {
        $resultados = [];
        try{
            $sql = "SELECT * FROM capacitacion.calculadora WHERE id = :id";
            $sentencia = $this->bd->prepare($sql);  
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();   
            $resultados =  $sentencia->fetch(PDO::FETCH_ASSOC);
            return  $resultados;   
        }catch(Exception $e){
            echo '<pre>'.print_r($e,true) .'</pre>';
            return  $resultados; 
            //die();            
        }        
    } 
    
    function eliminar($id)
    {
        $guardo = false;
        try{
            $sql = "DELETE FROM capacitacion.calculadora WHERE id = :id";
            $sentencia = $this->bd->prepare($sql);  
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();   
            $guardo =  $sentencia->rowCount();
            return $guardo;  
        }catch(Exception $e){
            echo '<pre>'.print_r($e,true) .'</pre>';
            return $guardo;
            //die();            
        }        
    }    

}