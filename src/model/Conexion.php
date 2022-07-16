<?php

class conexion{


    static function obtener()
    {
        $mbd = null;
        $db_host = 'serv-bd-ejemplo';
        $db_name = 'capacitacion';
        $db_username = 'root';
        $port = "3306";
        $db_password = 'root';        
        try {
            $mbd = new PDO('mysql:host='.$db_host.'; port='.$port.'; dbname='.$db_name,$db_username,$db_password);
            $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $mbd;
        } catch (PDOException $e) {
            echo '<pre>'.print_r($e,true) .'</pre>';
            die();
            return $mbd;
        }        
    }
}