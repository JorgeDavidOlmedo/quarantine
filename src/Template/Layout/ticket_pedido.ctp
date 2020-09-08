<?php
header('Content-type: application/pdf');
require_once(ROOT . DS . 'webroot' . DS . "fpdf" . DS . "fpdf.php");

$default = 208;
$largo = 460;
if($contador==2){
    $default = $default+5;
    $largo = $largo + 5;
}
if($contador==3){
    $default = $default+9;
    $largo = $largo + 10;
}
if($contador==4){
    $default = $default+14;
    $largo = $largo + 15;
}

if($contador==5){
    $default = $default+18;
    $largo = $largo + 20;
}

if($contador==6){
    $default = $default+24;
    $largo = $largo + 25;
}

if($contador==7){
    $default = $default+30;
    $largo = $largo + 30;
}

if($contador==8){
    $default = $default+36;
    $largo = $largo + 35;
}

if($contador==9){
    $default = $default+42;
    $largo = $largo + 40;
}

if($contador==10){
    $default = $default+45;
    $largo = $largo + 45;
}

$pdf = new FPDF($orientation='P',$unit='mm', array(140,$largo));
$pdf->AddPage();

#################NOMBRE EMPRESA###################################
$pdf->SetFont('Helvetica','B',15);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 15;
$pdf->setY(2);
$pdf->setX(0);
$pdf->Cell(133,$textypos, $empresa_descripcion,0,0,"C");
##################################################################
$pdf->SetFont('Helvetica','',14);
################SERVICIO##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(0);
$pdf->Cell(130,$textypos+13, "ORDEN DE SERVICIO: ".$id_venta,0,0,"C");
##################################################################

$pdf->SetFont('Helvetica','B',14);
################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(0);
$pdf->Cell(130,$textypos+30, "ESTADO:".$senha,0,0,"C");
##################################################################

$pdf->SetFont('Helvetica','',14);
################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+50, "Fecha:".$fecha,0,0,"L");
##################################################################

################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+65, "Facuturar a: ".utf8_decode($facturar_a),0,0,"L");
##################################################################

################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+80, "RUC: ".$ruc,0,0,"L");
##################################################################

################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+95, "Cliente: ".utf8_decode($cliente),0,0,"L");
##################################################################


################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+110, "Tel: ".$telefono,0,0,"L");
##################################################################

$pdf->SetFont('Helvetica','B',14);
################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+125, utf8_decode("Seña: ").number_format($senha_monto)." GS",0,0,"L");
##################################################################
$pdf->SetFont('Helvetica','',14);

################ORDEN##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$lugar_01 = substr($lugar,0,33);
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+140,utf8_decode("Lugar de Entrega: ").$lugar_01,0,0,"L");
##################################################################

$lugar_02 = substr($lugar,33,50);
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+155, $lugar_02,0,0,"L");
##################################################################

$pdf->SetFont('Helvetica','B',14);
$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+180, "PEDIDOS",0,0,"L");
##################################################################


$pdf->SetFont('Helvetica','',13);
$pdf->Ln(3);
$pdf->setY(39);
$pdf->setX(0);
$pdf->Cell(123,$textypos+130,'    ------------------------------------------------------------------------------------');
$pdf->setX(2);
$pdf->SetFont('Helvetica','B',13);
$pdf->Cell(123,$textypos+136,'    Cant.       Detalle                                  Precio              Total');
$total =0;
$pdf->SetFont('Helvetica','',13);
$pdf->setX(2);
$pdf->Cell(123,$textypos+140,'  ------------------------------------------------------------------------------------');

$off = $textypos+145;
$productos = array();
foreach ($venta as $valor){
    $productos[] = array(
        "q"=>$valor['cantidad'],
        "name"=>$valor['producto'],
        "price"=>$valor['precio_uni']
    );
}

$pdf->SetFont('Helvetica','',11);
$pdf->Ln(3);
//$productos = array($producto, $producto, $producto, $producto, $producto );
foreach($productos as $pro){
    $pdf->setX(10);
    $pdf->Cell(5,$off,$pro["q"],0,0,"R");
    $pdf->setX(26);
    $pdf->Cell(35,$off,  strtoupper(substr($pro["name"], 0,17)));
    //$pdf->Cell(35,$off, $pro["name"]);
    $pdf->setX(90);
    $pdf->Cell(11,$off,  number_format($pro["price"],0,".",",") ,0,0,"R");
    $pdf->setX(118);
    $pdf->Cell(11,$off,  number_format($pro["q"]*$pro["price"],0,".",",") ,0,0,"R");
    $total += $pro["q"]*$pro["price"];
    $off+=10;
    //$pdf->Ln();
}




$productos2 = array();
$consig = 0;
foreach ($venta2 as $valor){
    $consig = 1;
    $productos2[] = array(
        "q"=>$valor['cantidad'],
        "name"=>$valor['producto'],
        "price"=>$valor['precio_uni']
    );
}

$pdf->SetFont('Helvetica','B',14);
$pdf->setY(6);
$pdf->setX(10);
if($consig ==0){
    $pdf->Cell(130,$textypos+285, "SIN CONSIGNACION",0,0,"L");
}else{
    $pdf->Cell(130,$textypos+285, "CONSIGNACION",0,0,"L");
##################################################################


    $pdf->SetFont('Helvetica','',13);
    $pdf->Ln(3);
    $pdf->setY(39);
    $pdf->setX(0);
    $pdf->Cell(123,$textypos+234,'    ------------------------------------------------------------------------------------');
    $pdf->setX(2);
    $pdf->SetFont('Helvetica','B',13);
    $pdf->Cell(123,$textypos+240,'    Cant.       Detalle                                  Precio              Total');
    $total =0;
    $pdf->SetFont('Helvetica','',13);
    $pdf->setX(2);
    $pdf->Cell(123,$textypos+245,'  ------------------------------------------------------------------------------------');

    $off = $textypos+250;

    $pdf->SetFont('Helvetica','',11);
    $pdf->Ln(3);
//$productos = array($producto, $producto, $producto, $producto, $producto );
    foreach($productos2 as $pro){
        $pdf->setX(10);
        $pdf->Cell(5,$off,$pro["q"],0,0,"R");
        $pdf->setX(26);
        $pdf->Cell(35,$off,  strtoupper(substr($pro["name"], 0,17)));
        //$pdf->Cell(35,$off, $pro["name"]);
        $pdf->setX(90);
        $pdf->Cell(11,$off,  number_format($pro["price"],0,".",",") ,0,0,"R");
        $pdf->setX(118);
        $pdf->Cell(11,$off,  number_format($pro["q"]*$pro["price"],0,".",",") ,0,0,"R");
        $total += $pro["q"]*$pro["price"];
        $off+=10;
        //$pdf->Ln();
    }
}

$pdf->SetFont('Helvetica','',12);
$pdf->setY(6);
$pdf->setX(10);
$linea_01 = substr($obs,0,44);
$linea_02 = substr($obs,44,48);
$linea_03 = substr($obs,48,48);
$linea_04 = substr($obs,48,50);
$pdf->Cell(130,$textypos+380, "Obs: ".$linea_01,0,0,"L");
##################################################################

$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+392, $linea_02,0,0,"L");
##################################################################

$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+403, $linea_03,0,0,"L");
##################################################################

$pdf->setY(6);
$pdf->setX(10);
$pdf->Cell(130,$textypos+415, $linea_04,0,0,"L");
##################################################################


$pdf->Ln();

$pdf->output();
exit;


?>





