<?php
include_once('fpdf/fpdf.php');

class PdfModel
{
    private $database;
    private $fpdf;

    public function __construct($database)
    {
        $this->database = $database;
        $this->fpdf = new FPDF();

    }

    public function basePdf($datosviaje, $datosCarga, $datosEstimados)
    {
        $this->fpdf->AddPage();
        $this->fpdf->Image('img/nova.logo.png', -5, -8, 65);
        $this->fpdf->SetFont('Arial', 'B', 30);
        $this->fpdf->Cell(70, 10, '');
        $this->fpdf->Cell(65, 15, 'Proforma', '1', 0, 'C');
        //cambiar ruta según como está guardado el proyecto
        $this->fpdf->Image("http://localhost/codigos/prueba/view/qrcode.php", 178, 8, 25, 25, "png");
        $this->darEspaciado(45);
        $this->datosRepresentados('Datos de Viaje');
        $this->cargarDatos($datosviaje);
        $this->darEspaciado(30);
        $this->datosRepresentados('Datos de Carga');
        $this->cargarDatos($datosCarga);
        $this->darEspaciado(30);
        $this->datosRepresentados('Datos Estimados');
        $this->cargarDatos($datosEstimados);
        $this->fpdf->Output('D','Proforma.pdf');
    }

    public function cargarDatos($datos)
    {
        foreach ($datos as $key => $dato) {
            $this->fpdf->Ln(15);
            $this->fpdf->Cell(70, 10, "$key", '1', 0, 'L');
            $this->fpdf->Cell(120, 10, "$dato", '1', 0, 'C');
        }
    }

    public function datosRepresentados($datoRepresentado)
    {
        $this->fpdf->SetFont('Arial', '', 25);
        $this->fpdf->Cell(70, 12, "$datoRepresentado", '1', 0, 'C');
        $this->fpdf->Ln(5);
        $this->fpdf->SetFont('Arial', '', 20);
    }

    public function darEspaciado($espaciado)
    {
        $this->fpdf->Ln($espaciado);
    }
}