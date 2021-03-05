<?php
    require 'fpdf/fpdf.php';
    class PDF extends FPDF
    {
        function Header()
        {
            //llamada a imagen, pos x, y, size
            $this->Image('../img/logo.png', 5, 5, 30);
            //salto de linea
            $this->Ln(20);
            //Font type
            $this->SetFont('Arial','B',15);
            //creamos celda
            $this->Cell(30);
            //creamos celda sin contorno, salto de linea, centrada
            $this->Cell(130,10, 'Reporte Diario',0,1,'C');
            $this->Cell(190,5, 'Prestamo de Accesorios',0,0,'C');
            //salto de linea
            $this->Ln(20);
        }
        function Footer()
        {
            //tamaño footer
            $this->SetY(-15);
            //establecer una fuente
            $this->SetFont('Arial','I',8);
            //numero de paginas del pdf
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
?>