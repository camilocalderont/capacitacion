<?php

class VistaConsulta{

    public $operaciones = [
        '1'=>'SUMA',
        '2'=>'RESTA',
        '3'=>'MULTIPLICACION',
        '4'=>'DIVISION',
    ];
    function render($resultados){
        $html = '
            <table class="table">
                <thead>
                    <tr>
                        <td><strong>NumeroA</strong></td>
                        <td><strong>NumeroB</strong></td>
                        <td><strong>Operacion</strong></td>
                        <td><strong>Resultado</strong></td>
                        <td><strong>Acciones</strong></td>
                    </tr>
                </thead>
                <tbody>';

        foreach($resultados as $calculo){
            $html.= '
            <tr>
                <td>'.$calculo['numeroA'].'</td>
                <td>'.$calculo['numeroB'].'</td>
                <td>'.$this->operaciones[$calculo['operacion']].'</td>
                <td>'.number_format($calculo['resultado'],2,",",".").'</td>
                <td>
                    <button type="button" class="btn btn-info editar-calculo" data-id="'.$calculo['id'].'" >Editar</button>
                    <button type="button" class="btn btn-danger eliminar-calculo" data-id="'.$calculo['id'].'" >Eliminar</button>
                </td>
            </tr>
            ';
        }

        $html.= '</tbody>
            </table>
        
        ';
        return $html;
    }
}