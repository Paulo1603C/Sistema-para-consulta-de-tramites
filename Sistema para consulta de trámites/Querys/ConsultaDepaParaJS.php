<?php

        include("../Conexion/conexion.php");

        $dql="SELECT DEPARTAMENTO FROM V_TRAMITE_WEB1 GROUP BY DEPARTAMENTO";
        
        $stmt = oci_parse($conn,$dql);
        oci_execute($stmt);
        
        $lista = array();
        while ( ($row = oci_fetch_assoc($stmt)) != false ) {
            $aux = utf8_decode($row['DEPARTAMENTO']);
            array_push( $lista, $aux );
        }

        echo json_encode( $lista , JSON_UNESCAPED_UNICODE);
        
        //oci_free_statement($stmt);
        oci_close($conn);    
            
?>
