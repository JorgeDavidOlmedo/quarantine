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
################RUC##############################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(6);
$pdf->setX(0);
$pdf->Cell(130,$textypos+5, "Ruc: ".$empresa_ruc,0,0,"C");
##################################################################


#######################TELEFONO##################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(10);
$pdf->setX(0);
$pdf->Cell(130,$textypos+9, "Tel:".$empresa_contacto,0,0,"C");
##################################################################


#######################DIRECCION##################################
//$pdf->SetFont('Times','',8);    //Letra Arial, negrita (Bold), tam. 20

$direcc = substr($empresa_direccion,0,42);
$pdf->setY(14);
$pdf->setX(0);
//$pdf->MultiCell(70,$textypos, $empresa_direccion,0,0,"C",0);
$pdf->Cell(130,$textypos+13, "Direcc: ".$direcc,0,0,"C");
##################################################################


$direcc2 = substr($empresa_direccion,42,60);
$pdf->setY(18);
$pdf->setX(0);
//$pdf->MultiCell(70,$textypos, $empresa_direccion,0,0,"C",0);
$pdf->Cell(130,$textypos+16,$direcc2,0,0,"C");
##################################################################


$pdf->setY(22);
$pdf->setX(0);
$pdf->Cell(123,$textypos+20, "Timbrado:".$numero_timbrado,0,0,"C");

$fecha_desde = explode("-",$fecha_desde);
$fecha_desde = $fecha_desde[2]."/".$fecha_desde[1]."/".$fecha_desde[0];
$pdf->setY(26);
$pdf->setX(0);
$pdf->Cell(123,$textypos+25, "Inicio Vigencia:".$fecha_desde,0,0,"C");


$fecha_hasta= explode("-",$fecha_hasta);
$fecha_hasta = $fecha_hasta[2]."/".$fecha_hasta[1]."/".$fecha_hasta[0];
$pdf->setY(30);
$pdf->setX(0);
$pdf->Cell(123,$textypos+30, "Fin Vigencia:".$fecha_hasta,0,0,"C");


$fecha= explode("-",$fecha);
$fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0];
$pdf->setY(34);
$pdf->setX(0);
$pdf->Cell(123,$textypos+36, "Fecha:".$fecha,0,0,"C");

$pdf->SetFont('Helvetica','B',15);
$pdf->setY(36);
$pdf->setX(0);
$pdf->Cell(130,$textypos+46, $descripcion_factura,0,0,"C");

$pdf->SetFont('Helvetica','',13);
$pdf->Ln(3);
$pdf->setY(39);
$pdf->setX(0);
$pdf->Cell(123,$textypos+55,'    ------------------------------------------------------------------------------------');
$textypos+=6;
$pdf->setX(2);
$pdf->SetFont('Helvetica','B',13);
$pdf->Cell(123,$textypos+57,'    Cant.       Detalle                                         Precio              Total');
$total =0;
$pdf->SetFont('Helvetica','',13);
$pdf->setX(2);
$pdf->Cell(123,$textypos+63,'  ------------------------------------------------------------------------------------');

$off = $textypos+68;
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


$textypos=$off+6;
$pdf->SetFont('Helvetica','B',12);
$pdf->setX(2);
$pdf->Cell(5,$textypos+2,'   --------------------------------------------------------------------------------------------');
$mas = $textypos + 4;
$pdf->Ln(3);
$pdf->setX(6);
$pdf->Cell(5,$mas,"Total: " );
$pdf->setX(125);
$pdf->Cell(5,$mas," ".$moneda."  ".number_format($total,0,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+11,'   --------------------------------------------------------------------------------------------');

$pdf->setX(6);
$pdf->Cell(5,$textypos+18,"Exentas: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+18," ".number_format($exenta,0,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+25,'   --------------------------------------------------------------------------------------------');

$pdf->setX(6);
$pdf->Cell(5,$textypos+34,"Gravada 5%: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+34," ".number_format($gravada5,0,".",","),0,0,"R");

$pdf->setX(6);
$pdf->Cell(5,$textypos+46,"Iva 5%: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+46," ".number_format($iva5,0,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+55,'   --------------------------------------------------------------------------------------------');

$pdf->setX(6);
$pdf->Cell(5,$textypos+63,"Gravada 10%: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+63," ".number_format($gravada10,0,".",","),0,0,"R");

$pdf->setX(6);
$pdf->Cell(5,$textypos+75,"Iva 10%: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+75," ".number_format($iva10,0,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+83,'   --------------------------------------------------------------------------------------------');

$pdf->setX(6);
$pdf->Cell(5,$textypos+91,"Total Gravadas: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+91," ".number_format($gravada10,0,".",","),0,0,"R");

$pdf->setX(6);
$pdf->Cell(5,$textypos+103,"Iva 10%: " );
$pdf->setX(125);
$pdf->Cell(5,$textypos+103," ".number_format($iva10,0,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+110,'   --------------------------------------------------------------------------------------------');

$pdf->SetFont('Helvetica','B',13);

$pdf->setX(15);
$pdf->Cell(5,$textypos+120,"Cliente: " );
$pdf->setX(62);
$pdf->SetFont('Helvetica','',13);
$pdf->Cell(5,$textypos+120," ".utf8_decode($cliente),0,0,"C");
$pdf->SetFont('Helvetica','B',13);
$pdf->setX(6);
$pdf->Cell(5,$textypos+133,"Documento: " );
$pdf->setX(56);
$pdf->SetFont('Helvetica','',13);
$pdf->Cell(5,$textypos+133," ".$documento,0,0,"C");
$pdf->SetFont('Helvetica','B',12);
$pdf->setX(2);
$pdf->Cell(5,$textypos+140,'   --------------------------------------------------------------------------------------------');


$pdf->setX(28);
$pdf->Cell(5,$textypos+150,"*****GRACIAS POR SU COMPRA***** " );


$pdf->setX(15);
$pdf->Cell(5,$textypos+165,"Autorizado como autoimpresor por la SET segun solicitud No.");

$pdf->setX(35);
$pdf->Cell(5,$textypos+175,"350010005757 de fecha 03/05/2019.");


$pdf->setX(30);
$pdf->Cell(5,$textypos+195,"USTED PUEDE PAGAR CON PUNTOS!");

$pdf->setX(40);
$pdf->Cell(5,$textypos+210,"CODIGO CLIENTE: ".$id_cliente);


//$url = 'https://app.integralix.net/codigoQR/temp/cliente0999999_'.$id_cliente.'.png';
//$h = get_headers($url);
//$status = array();
//preg_match('/HTTP\/.* ([0-9]+) .*/', $h[0] , $status);
//$resultado = $status[1] == 200;

$url_cliente = 'https://app.integralix.net/codigoQR/temp/mega.png';
//$url_default = 'https://app.integralix.net/codigoQR/temp/test_png';

//$resultado? $url_imagen=$url_cliente : $url_imagen=$url_default;

$pdf->Image($url_cliente, 50, $default,-130);
//$pdf->Cell(70,$mas+40, $pdf->Image('https://app.integralix.net/codigoQR/temp/mega.png', 23, $mas+50,-150),1);
$pdf->Ln();

$pdf->output();
exit;


?>





