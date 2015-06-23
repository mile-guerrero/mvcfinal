<?php

use mvc\routing\routingClass as routing;
  
  $id = solicitudInsumoTableClass::ID;
  $fechaMantenimiento = solicitudInsumoTableClass::FECHA_HORA;
  $lote = solicitudInsumoTableClass::LOTE_ID;
  $producto = solicitudInsumoTableClass::PRODUCTO_INSUMO_ID;
  $cantidad = solicitudInsumoTableClass::CANTIDAD;
  $trabajador = solicitudInsumoTableClass::TRABAJADOR_ID;
 
class PDF extends FPDF {

  function Header() {
    
    $this->Image(routing::getInstance()->getUrlImg('portada4.png'), 0, 0, 210);
    $this->SetFont('Arial', 'B', '15');
    $this->Ln(10);
   # $this->Cell(80);
   # $this->Cell(30, 10, 'Cliente', 1, 0, 'C');
    $this->Ln(30);
    
  }
 

  
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'page' . $this->PageNo() . '/{Solicitud insumo}', 0, 0, 'C');
    
  }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);

$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190, 10, $mensaje, 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(40, 10, "Fecha mantenimiento",1, 0, 'C');
$pdf->Cell(35, 10, "Lote",1, 0, 'C');
$pdf->Cell(30, 10, "Trabajador",1, 0, 'C');
$pdf->Cell(30, 10, "Producto",1, 0, 'C');
$pdf->Cell(55, 10, "Cantidad",1, 0, 'C');
$pdf->Ln();
foreach ($objS as $valor) {  
  $pdf->Cell(40, 8, utf8_decode($valor->$fechaMantenimiento),1);  
  $pdf->Cell(35, 8, loteTableClass::getNameLote($valor->$lote),1);
  $pdf->Cell(30, 8, trabajadorTableClass::getNameTrabajador($valor->$trabajador),1);
  $pdf->Cell(30, 8, productoInsumoTableClass::getNameProductoInsumo($valor->$producto),1);
  $pdf->Cell(55, 8, utf8_decode($valor->$cantidad),1);  
  $pdf->Ln();  
}


$pdf->Output();
?>