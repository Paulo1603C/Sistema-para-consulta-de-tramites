<?php

include("pdf_mc_table.php");
include("../../Conexion/conexion.php");

//query de los requisitos
$tramite = isset($_REQUEST['t']) ? $_REQUEST['t'] : "datos";
$tittleMain = isset($_REQUEST['tt']) ? $_REQUEST['tt'] : "datos";
$dql=" SELECT REQUISITOS from V_TRAMITE_WEB2 where tramite='$tramite'";        
$stmt = oci_parse($conn,$dql);
oci_execute($stmt);

// Creación del objeto de la clase heredada
$pdf = new PDF_MC_Table();
$pdf->AddPage();
//$pdf->SetFont( 'Arial','', 14 );
$pdf->SetWidths(Array(10,180));
$pdf->SetLineHeight(7);

$pdf->SetFont('Arial','B',13.5);
$pdf->SetTextColor(12,24,109);
$pdf->MultiCell(190,10,utf8_decode("DEPARTAMENTO DE ".$tittleMain),'','C',0);
$pdf->SetFont('Arial','B',13.5);
$pdf->Cell(190,10,utf8_decode('REQUISITOS PARA TRÁMITE'), 0,1,'C');
$pdf->setTextColor(55,190,255);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(190,10,utf8_decode($tramite),'','C',0);

$pdf->Ln(5);

//Cabecera Datos Persona
$pdf->SetFont( 'Arial','B', 12 );
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,0,0);
$pdf->SetLineWidth(.3);
$pdf->Row(Array(
    "ID",
    "NOMBRE",
));

//CARGA DE DATOS
$i=1;
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(255,255,255);
while ( ($row = oci_fetch_assoc($stmt)) != false ) {
    $aux = utf8_decode($row['REQUISITOS']);
    $pdf->Row(Array(
        $i,
        $aux,
    ));  
    $i++;
}


$pdf->Output();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="text/jpg" href="../../img/menu.png">
    <title>Reportes Trámites</title>
</head>
<body>    
</body>
</html>
