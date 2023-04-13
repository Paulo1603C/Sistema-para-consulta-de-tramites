<?php

$dato = isset($_REQUEST['v']) ? $_REQUEST['v'] : null;


function tramites(){
    global $dato;  
    //include("../../Conexion/conexion.php");
    include("../Conexion/conexion.php");
    $dql="SELECT COD_TRAMITE,TRAMITE from V_TRAMITE_WEB1 WHERE DEPARTAMENTO='$dato'";
        
    $stmt = oci_parse($conn,$dql);
    oci_execute($stmt);

    //$lista = array();
    $data = '';
    while ( ($row = oci_fetch_assoc($stmt)) != false ) {
        $aux = $row['TRAMITE'];
        $data .= '<tr  class="hover" id="'.$aux.'">';
        $data .= '<td class="list-group-item rq" name="dato" id="'.$aux.'" > ';
        $data .= $aux;
        $data .= '</td> ';
        $data .='</tr> ';
    }
    //return json_encode( $data , JSON_UNESCAPED_UNICODE);
    echo $data;
    oci_close($conn); 
}




?>