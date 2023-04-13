<?php

class QueryDepartamentos{
    
    function queryAvaluoCatastros( $requisito ){
        include("../Conexion/conexion.php");
        $dql=" SELECT REQUISITOS
        from V_TRAMITE_WEB2
        where tramite='$requisito' ";
            
        $stmt = oci_parse($conn,$dql);
        oci_execute($stmt);
        //$lista = array();
        $data = '';
        while ( ($row = oci_fetch_assoc($stmt)) != false ) {
            $aux = $row['REQUISITOS'];
            //$aux2 .= "<li class='text-xl-start'>".$aux."</li>"
            //array_push( $lista, $aux );
            $data .= '<li class="text-xl-start lis__req " >';
            $data .= $aux;
            $data .='</li>';
        }
        return json_encode( $data , JSON_UNESCAPED_UNICODE);
        oci_close($conn);  
    }

}

?>