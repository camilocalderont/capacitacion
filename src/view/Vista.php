<?php

class Vista{

    function render($calc,$guardoBD){
        $bd = $guardoBD ? 'Registro guardado' : 'No guardo el registro';

        $html = "

        <p>Desde Vista: El resultado de la operacion ".$calc->operacion." es:</p>
        <p><strong>".number_format($calc->calcular(),2,",",".")."</strong></p>
        <p>".$bd."</p>
        ";
        return $html;
    }
}