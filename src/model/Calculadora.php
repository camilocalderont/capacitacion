<?php

class Calculadora{
    //Atributos de la clase
    public $id;
    public $numeroA;
    public $numeroB;
    public $operacion;


    //Se ejecuta con el new
    function __construct($id,$numeroA,$numeroB,$operacion) {
        $this->id = $id;
        $this->numeroA = $numeroA;
        $this->numeroB = $numeroB;
        $this->operacion = $operacion;
    }    

    function calcular()
    {
        $resultado = 0;    
        switch($this->operacion){
            case '1': //suma
                $resultado = $this->numeroA+$this->numeroB;
                break;
            case '2': //resta
                $resultado = $this->numeroA-$this->numeroB;
                break; 
            case '3': //multiplicacion
                $resultado = $this->numeroA*$this->numeroB;
                break;  
            case '4': //division
                $resultado = $this->numeroA/$this->numeroB;
                break;                                              
        }
        return $resultado;
        
    }
}
