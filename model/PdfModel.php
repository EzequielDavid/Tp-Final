<?php
include_once('fpdf/fpdf.php');

class PdfModel
{
    private $database;
    private $pdf;

    public function __construct($database)
    {
        $this->database = $database;
        $this->pdf= new FPDF();
    }

    public function basePdf($datosCarga)
    {
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetFont('Arial','B',20);
        $this->pdf->Cell(80,10,'');
        $this->pdf->Cell(80,10,'Proforma');
        foreach($datosCarga as $datos)
        {
            $this->pdf->Ln(15);
            $this->pdf->Cell(80,10,"$datos",'N');
            $this->pdf->Ln(5);
        }
        $this->pdf->Output();

    }
}