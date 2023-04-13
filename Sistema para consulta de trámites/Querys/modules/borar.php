<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    UTF-8
</body>
</html>

<?php

header('Content-Type: text/html; charset=utf-8');

include("../../Conexion/conexion.php");
    $dql="SELECT COD_TRAMITE,TRAMITE from V_TRAMITE_WEB1 WHERE DEPARTAMENTO='CONTROL MUNICIPAL' ";
        
    $stmt = oci_parse($conn,$dql);
    oci_execute($stmt);

    //$lista = array();
    $data = '';
    while ( ($row = oci_fetch_assoc($stmt)) != false ) {
        $aux = utf8_decode($row['TRAMITE']);
        $data .= '<div class="pagination__item" name="dato" id="'.$aux.'" > ';
        $data .= ' <li class="list-group-item rq" name="dato" id="'.$aux.'"  > ';
        $data .= $aux;
        $data .= ' </li> ';
        $data .=' </div> ';
    }
    //return json_encode( $data , JSON_UNESCAPED_UNICODE);
    echo $data;
    oci_close($conn);

?>