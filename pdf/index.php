<?php
//incluir plantilla php
include 'plantilla.php';
//agregar la conexion
require '../php/conexion.php';
//usar la clase pdf de la pantilla

$pdf = new PDF();
//indicar un alias para el numero de paginas
$pdf->AliasNbPages();
//agregamos una nueva pagina
$pdf->AddPage();
//crear encabezados
//fondo de la hoja
$pdf->SetFillColor(232,232,232);
//agregamos la fuente
$pdf->SetFont('Arial','B',12);
//agregamos celdas
$pdf->Cell(40,6,utf8_decode('Nro. Préstamo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Fecha'),1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('C.I. Cliente'),1,0,'C',1);
$pdf->Cell(40,6,utf8_decode('Cod. Accesorio'),1,0,'C',1);
$pdf->Cell(40,6,utf8_decode('Descripción'),1,1,'C',1);
//colocar atributos
$pdf;
//mostramos el pdf
$pdf->Output();
?>