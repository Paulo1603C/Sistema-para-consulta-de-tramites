
<?php

    //scrit para la conexion
    $usename="CONSULTA";
    $pass="CONSULTA";
    $nombreServidor = "192.168.69.5/cabildo";
    //$BD="GADSPP";

    //$db_test = '(DESCRIPTION=( ADDRESS_LIST= (ADDRESS= (PROTOCOL=TCP) (HOST=192.168.69.10) (PORT=1433)))( CONNECT_DATA= (SID=pruebas) ))';
    $conn = oci_connect($usename, $pass, $nombreServidor, 'AL32UTF8');
    
    //conprovacion dela conexion
    /*if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }else{
        echo "Conectado";
    }*/
?>