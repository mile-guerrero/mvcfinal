<?php
use mvc\routing\routingClass as routing;

$ubi = loteTableClass::UBICACION;
$tamano = loteTableClass::TAMANO;
$des = loteTableClass::DESCRIPCION;
$createdAt = loteTableClass::CREATED_AT;
$fecha = loteTableClass::FECHA_INICIO_SIEMBRA;
$plantas = loteTableClass::NUMERO_PLANTULAS;
$insumo = loteTableClass::PRODUCTO_INSUMO_ID;
$updated_at = loteTableClass::UPDATED_AT;
$nomCiu = loteTableClass::ID_CIUDAD;




class PDF extends FPDF {

  function Header() {
    
    $this->Image(routing::getInstance()->getUrlImg('logoColmenar.png'), 10, 22, 80);
    $this->SetFont('courier', 'B', '25');
//    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(255,204,51);
//    $this->SetTextColor(220,50,50);
//    $this->Cell(10);
//    $this->SetFillColor(200,220,255);
    
    $this->Cell( 0, 10, 'Lote' , 2, 10,'C', true);
    $this->Ln(45);
    
  }
 

  
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'page' . $this->PageNo() . '/{Lote}', 0, 0, 'C');
    
  }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('courier', 'B', 12);

$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(255,204,51);//color
$pdf->Cell(190, 10, $mensaje, 1, 0, 'C', true);
$pdf->Ln();
$pdf->SetFont('courier', 'B', 10);
$pdf->Cell(35, 10, "Ubicacion",1, 0, 'C');
$pdf->Cell(15, 10, utf8_decode("Tamaño"),1, 0, 'C');
$pdf->Cell(50, 10, "Descripcion",1, 0, 'C');
$pdf->Cell(35, 10, "Fecha siembra",1, 0, 'C');
$pdf->Cell(30, 10, "Insumo",1, 0, 'C');
$pdf->Cell(25, 10, "# Plantulas",1, 0, 'C');
$pdf->Ln();

$pdf->SetFont('courier', 'B', 8);
foreach ($objLote as $valor){
  $pdf->Cell(35,8, utf8_decode($valor->$ubi).' '.ciudadTableClass::getNameCiudad($valor->$nomCiu),1);
  $pdf->Cell(15,8, utf8_decode($valor->$tamano),1, 0, 'C');
  $pdf->Cell(50,8, utf8_decode($valor->$des),1);
  $pdf->Cell(35,8, utf8_decode($valor->$fecha),1);
   
  if (($valor->$insumo) === null){        
               $pdf->Cell(30,8, ' ',1);
             }else{
                $pdf->Cell(30,8, productoInsumoTableClass::getNameProductoInsumo($valor->$insumo),1);
             }
    
  
  
  $pdf->Cell(25,8, utf8_decode($valor->$plantas),1);
  
  $pdf->Ln();  
}
$pdf->Output();
?>