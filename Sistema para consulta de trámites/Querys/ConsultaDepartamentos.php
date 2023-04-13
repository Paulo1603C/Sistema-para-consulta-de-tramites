<?php

function departamentos(){

        include("Conexion/conexion.php");

        //$departamentos = ["ordenControl", "catastrosEvaluo","obrasPublicas", "tics"];

        $dql="SELECT DEPARTAMENTO FROM V_TRAMITE_WEB1 GROUP BY DEPARTAMENTO";

        //$lista = array();
        $stmt = oci_parse($conn,$dql);
        oci_execute($stmt);

        $cont=0;

        while (($row = oci_fetch_array($stmt, OCI_BOTH)) != false) {

            echo '<meta charset="utf-8">';
             echo '<div id="'.utf8_decode($row['DEPARTAMENTO']).'" name="tramite" class="card" >';
             //echo '<img class="img-card card-img-top" src="img/'.$imgs[$cont].'.jpg" alt="Card image cap" >';
             echo   '<div class="card_body texto" id="'.utf8_decode($row['DEPARTAMENTO']).'">';
             echo       utf8_decode($row['DEPARTAMENTO']);
             echo   '</div>';
             echo '</div>';

             $cont++;
        }

        //echo json_encode( $html_a, JSON_UNESCAPED_UNICODE);
      
        oci_free_statement($stmt);
        oci_close($conn);
        
    }

    

?>