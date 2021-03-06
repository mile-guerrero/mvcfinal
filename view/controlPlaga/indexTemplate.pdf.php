<?php

use mvc\routing\routingClass as routing;

 $lote = controlPlagaTableClass::LOTE_ID;
 $plaga = controlPlagaTableClass::PLAGA_ID;
 $id = controlPlagaTableClass::ID;
 $insumo = controlPlagaTableClass::PRODUCTO_INSUMO_ID;
 $cantidad = controlPlagaTableClass::CANTIDAD;
 $unidadMedida = controlEnfermedadTableClass::UNIDAD_MEDIDA_ID;

class PDF extends FPDF {

  function Header() {
    
    $this->Image(routing::getInstance()->getUrlImg('logoColmenar.png'), 10, 22, 80);
    //IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)
    $this->SetFont('courier', 'B', '25');
//    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(255,204,51);
//    $this->SetTextColor(220,50,50);
//    $this->Cell(10);
//    $this->SetFillColor(200,220,255);
    
    $this->Cell( 0 , 10, 'Control de la plaga' , 2, 10,'C', true);
    $this->Ln(45);
    
  }
 

  
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'page' . $this->PageNo() . '/{Control plaga}', 0, 0, 'C');
    
  }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('courier', 'B', 9);

$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(255,204,51);//color
$pdf->Cell(190, 10, $mensaje, 1, 0, 'C', true);
$pdf->Ln();
$pdf->Cell(65, 10, "Lote",1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode("Producto"),1, 0, 'C', true);
$pdf->Cell(65, 10, utf8_decode("Cantidad"),1, 0, 'C', true);
$pdf->Ln();
foreach ($objControlPlaga as $valor) {  
  $pdf->Cell(65, 8, loteTableClass::getNameLote($valor->$lote),1);
  $pdf->Cell(60, 8, utf8_decode(productoInsumoTableClass::getNameProductoInsumo($valor->$insumo)),1);
  $pdf->Cell(65, 8, utf8_decode($valor->$cantidad). ' ' . unidadMedidaTableClass::getNameUnidadMedida($valor->$unidadMedida),1);  
  $pdf->Ln();
  $pdf->Cell(35, 10, utf8_decode("Plaga"),1, 0, 'C', true);
  $pdf->MultiCell(155, 8, utf8_decode(plagaTableClass::getNamePlaga($valor->$plaga)) . ':' . ' ' . utf8_decode(plagaTableClass::getNameDes($valor->$plaga)),1);
  $pdf->Cell(35, 10, utf8_decode("Tratamiento"),1, 0, 'C',true);
  $pdf->MultiCell(155, 8,utf8_decode(plagaTableClass::getNameTratamiento($valor->$plaga)),1,'J', false);
  $pdf->Ln();  
}


$pdf->Output();
?>