<?php


use mvc\routing\routingClass as routing;

class PDF extends FPDF
{

function Header()
{
    



//
//    
//$this->Image(routing::getInstance()->getUrlImg('marca.png'),-20,0,300);
//$this->Image(routing::getInstance()->getUrlImg('log.png'),160,10,40);
//$this->Image(routing::getInstance()->getUrlImg('logos.png'),10,18,20);

$this->SetFont('Courier','',12);
$txt=(date("d-m-Y H:i:s"));

$this->MultiCell(0,5,$txt,0,'J');
$this->Ln(15);
    // Arial bold 15
    $this->SetFont('Times','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(15,1,'Reporte  de eventos creados',10,0,'C');
    // Salto de línea
    $this->Ln(30);
}


// Pie de página
function Footer()
{
    
    $this->SetY(-15);
 
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,'Cultura Caleña',0,0,'C');
}
}




$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Times','B',16);



$pdf->Cell(60,5,'Nombre',1,0);
//$pdf->Ln();

$pdf->Cell(31,5, 'Categoria',1,0);

$pdf->Cell(55,5, 'Fecha Inicial Evento',1,0);



$pdf->Cell(65,5, 'Fecha Inicial Publicacion',1,0);



$pdf->Ln(8);
foreach ($objEventoCate as $data){

$pdf->SetFont('');



$pdf->Cell(60,5,  utf8_decode($data->evento),1,0,'C');

$pdf->Cell(31,5,  utf8_decode($data->nombre),1,0,'C');

$pdf->Cell(55,5,  utf8_decode($data->fecha_inicial_evento),1,0,'C');


$pdf->Cell(65, 5,  utf8_decode($data->fecha_inicial_publicacion),1,0,'C');




$pdf->Ln();
}

$pdf->Ln();







//$pdf->Cell(55,10,  utf8_decode(date("d-m-Y H:i:s")),1);
$pdf->SetFont('Times','',12);
$txt="nnnk";

$pdf->MultiCell(0,5,$txt,0,'J');



$pdf->Output();

