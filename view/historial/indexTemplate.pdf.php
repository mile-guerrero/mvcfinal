<?php
use mvc\routing\routingClass as routing;

$insumo = historialTableClass::PRODUCTO_INSUMO_ID;
$enfermedad = historialTableClass::ENFERMEDAD_ID;
$plaga = historialTableClass::PLAGA_ID;
$createdAt = historialTableClass::CREATED_AT;


class PDF extends FPDF {

  function Header() {
    
    $this->Image(routing::getInstance()->getUrlImg('logoColmenar.png'), 10, 22, 80);
    $this->SetFont('courier', 'B', '25');
//    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(255,204,51);
//    $this->SetTextColor(220,50,50);
//    $this->Cell(10);
//    $this->SetFillColor(200,220,255);
    
    $this->Cell( 0, 10, 'Historial' , 2, 10,'C', true);
    $this->Ln(45);
    
  }
 

  
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'page' . $this->PageNo() . '/{Historial}', 0, 0, 'C');
    
  }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('courier', 'B', 8);

$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(255,204,51);//color
$pdf->Cell(190, 10, $mensaje, 1, 0, 'C', true);
$pdf->Ln();




$pdf->SetFont('courier', 'B', 10);

foreach ($objHistorial as $valor) {
  $pdf->SetFillColor(255,204,51);//color
  $pdf->Cell(40, 10, "Insumo",1, 0, 'C',true);
  $pdf->Cell(150, 10, productoInsumoTableClass::getNameProductoInsumo($valor->$insumo),1);
  $pdf->Ln();
  $pdf->Cell(40, 10, "Enfermedad",1, 0, 'C',true);
  $pdf->Cell(150, 10, enfermedadTableClass::getNameEnfermedad($valor->$enfermedad),1);
  $pdf->Ln();
  $pdf->Cell(40, 10, utf8_decode("Descripción"),1, 0, 'C',true);
  $pdf->MultiCell(150, 8,utf8_decode(enfermedadTableClass::getNameDes($valor->$enfermedad)),1);
  $pdf->Cell(40, 10, utf8_decode("Tratamiento"),1, 0, 'C',true);
  $pdf->MultiCell(150, 8,utf8_decode(enfermedadTableClass::getNameTratamiento($valor->$enfermedad)),1,'J', false);
  $pdf->Cell(40, 10, "plaga",1, 0, 'C',true);
  $pdf->Cell(150, 10,utf8_decode(plagaTableClass::getNamePlaga($valor->$plaga)),1);
  $pdf->Ln();
  $pdf->Cell(40, 10, utf8_decode("Descripción"),1, 0, 'C',true);
  $pdf->MultiCell(150, 8,utf8_decode(plagaTableClass::getNameDes($valor->$plaga)),1);
  $pdf->Cell(40, 10, utf8_decode("Tratamiento"),1, 0, 'C',true);
  $pdf->MultiCell(150, 8,utf8_decode(plagaTableClass::getNameTratamiento($valor->$plaga)),1,'J', false);
  $pdf->Ln();
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Output();

//class PDF extends FPDF
//{
//var $B;
//var $I;
//var $U;
//var $HREF;
//
//function PDF($orientation='P', $unit='mm', $size='A4')
//{
//    // Llama al constructor de la clase padre
//    $this->FPDF($orientation,$unit,$size);
//    // Iniciación de variables
//    $this->B = 0;
//    $this->I = 0;
//    $this->U = 0;
//    $this->HREF = '';
//}
//
//function WriteHTML($html)
//{
//    // Intérprete de HTML
//    $html = str_replace("\n",' ',$html);
//    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
//    foreach($a as $i=>$e)
//    {
//        if($i%2==0)
//        {
//            // Text
//            if($this->HREF)
//                $this->PutLink($this->HREF,$e);
//            else
//                $this->Write(5,$e);
//        }
//        else
//        {
//            // Etiqueta
//            if($e[0]=='/')
//                $this->CloseTag(strtoupper(substr($e,1)));
//            else
//            {
//                // Extraer atributos
//                $a2 = explode(' ',$e);
//                $tag = strtoupper(array_shift($a2));
//                $attr = array();
//                foreach($a2 as $v)
//                {
//                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
//                        $attr[strtoupper($a3[1])] = $a3[2];
//                }
//                $this->OpenTag($tag,$attr);
//            }
//        }
//    }
//}
//
//function OpenTag($tag, $attr)
//{
//    // Etiqueta de apertura
//    if($tag=='B' || $tag=='I' || $tag=='U')
//        $this->SetStyle($tag,true);
//    if($tag=='A')
//        $this->HREF = $attr['HREF'];
//    if($tag=='BR')
//        $this->Ln(5);
//}
//
//function CloseTag($tag)
//{
//    // Etiqueta de cierre
//    if($tag=='B' || $tag=='I' || $tag=='U')
//        $this->SetStyle($tag,false);
//    if($tag=='A')
//        $this->HREF = '';
//}
//
//function SetStyle($tag, $enable)
//{
//    // Modificar estilo y escoger la fuente correspondiente
//    $this->$tag += ($enable ? 1 : -1);
//    $style = '';
//    foreach(array('B', 'I', 'U') as $s)
//    {
//        if($this->$s>0)
//            $style .= $s;
//    }
//    $this->SetFont('',$style);
//}
//
//function PutLink($URL, $txt)
//{
//    // Escribir un hiper-enlace
//    $this->SetTextColor(0,0,255);
//    $this->SetStyle('U',true);
//    $this->Write(5,$txt,$URL);
//    $this->SetStyle('U',false);
//    $this->SetTextColor(0);
//}
//}
//
//
//
//$html = 'Ahora puede imprimir <br><fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
//<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b>!<br><br>También puede incluir enlaces en el
//texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.';
//
//
//
//$pdf = new PDF();
//// Primera página
//$pdf->AddPage();
//$pdf->SetFont('Arial','',20);
//$pdf->Write(5,'Para saber qué hay de nuevo en este tutorial, pulse ');
//$pdf->SetFont('','U');
//$link = $pdf->AddLink();
//$pdf->Write(5,'aquí',$link);
//$pdf->SetFont('');
//// Segunda página
//$pdf->AddPage();
//$pdf->SetLink($link);
//$pdf->Image(routing::getInstance()->getUrlImg('portada4.png'), 10,12,30,0);
//$pdf->SetLeftMargin(45);
//$pdf->SetFontSize(14);
//$pdf->WriteHTML($html);
//
//foreach ($objHistorial as $valor) {
//  $pdf->Cell(30, 8, productoInsumoTableClass::getNameProductoInsumo($valor->$insumo),1);
//  $pdf->Cell(30, 8, enfermedadTableClass::getNameEnfermedad($valor->$enfermedad),1);
//  $pdf->Cell(50, 8, enfermedadTableClass::getNameDes($valor->$enfermedad),1);
//  $pdf->Cell(45, 8, enfermedadTableClass::getNameTratamiento($valor->$enfermedad),1);
//  $pdf->Cell(35, 8, utf8_decode($valor->$createdAt),1);
//  $pdf->Ln();
//}
//$pdf->Output();
  
?>