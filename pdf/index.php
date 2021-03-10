<?php
//incluir plantilla php
include 'plantilla.php';
//agregar la conexion
require '../php/conexion.php';
//realizar la consulta
$query="SELECT prestamoaccesorio.PrestamoID, accesorio.Descripcion, usuario.NombreUsuario 
FROM accesorio 
INNER JOIN prestamoaccesorio ON accesorio.NroInventarioAccesorio = prestamoaccesorio.NroInventarioAccesorio 
INNER JOIN usuario ON usuario.NroCIUsuario = prestamoaccesorio.NroCIUsuario;";
//crear una variable
$resultado = $mysqli->query($query);
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
$pdf->Cell(35,6,utf8_decode('Nro. Préstamo'),1,0,'C',1);
$pdf->Cell(75,6,utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(80,6,utf8_decode('Nombre Usuario Préstamo'),1,1,'C',1);
//colocar atributos
while($row=$resultado->fetch_assoc())
{
    $pdf->Cell(35,6,utf8_decode($row['PrestamoID']),1,0,'C');
    $pdf->Cell(75,6,utf8_decode($row['Descripcion']),1,0,'C');   
    $pdf->Cell(80,6,utf8_decode($row['NombreUsuario']),1,1,'C');
}
//mostramos el pdf
$pdf->Output();
?>