<?php

$dato = isset($_POST['dato'])? $_POST['dato'] :null;

if( $dato!=null ){
    require_once('QueryRequerimientosDepartamentos.php');

    $querys = new QueryDepartamentos(); 
    echo $querys->queryAvaluoCatastros($dato);

}else{
    echo json_encode("");
}



?>