<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/clientes/config/global.php");

require_once(ROOT_DIR . "/model/BebidasModel.php"); // Cambia Ven_clientesModel a BebidasModel
require(ROOT_CORE . '/fpdf/fpdf.php');

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt ?? ''); // Asegura que el texto no sea null
    }

    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "Reporte de Bebidas", 0, 1, 'C'); // Cambia el título del informe
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Cambia 'c' a 'C' para centrar correctamente
    }
}

$rpt = new BebidasModel(); // Cambia Ven_clientesModel a BebidasModel

$records = $rpt->findall();
$records = $records['DATA'];

$pdf = new PDF('L', 'mm', 'A4'); // 'L' para Landscape, 'mm' para milímetros, 'A4' para el tamaño de la hoja
$pdf->AliasNbPages();
$pdf->AddPage();

// Cabecera
$pdf->SetFont('Arial', 'B', 8);
$header = array(
    $pdf->convertxt("No."),
    $pdf->convertxt("Nombre"),
    $pdf->convertxt("Tipo"),
    $pdf->convertxt("Marca"),
    $pdf->convertxt("Precio"),
    $pdf->convertxt("Cantidad"),
    $pdf->convertxt("Proveedor"),
    $pdf->convertxt("Código Barra"),
    $pdf->convertxt("Volumen"),
    $pdf->convertxt("Calorías"),
    $pdf->convertxt("Azúcar"),
    $pdf->convertxt("Alcohol"),
    $pdf->convertxt("Ingredientes"),
    $pdf->convertxt("Descripción"),
    $pdf->convertxt("Stock"),
    $pdf->convertxt("Sabor")
);
$widths = array(10, 30, 20, 20, 15, 15, 25, 25, 15, 15, 15, 15, 30, 30, 15, 20);
for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();

// Cuerpo
$pdf->SetFont('Arial', '', 7);
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6, $pdf->convertxt($row['id']), 1);
    $pdf->Cell($widths[1], 6, $pdf->convertxt($row['beb_nombre']), 1);
    $pdf->Cell($widths[2], 6, $pdf->convertxt($row['beb_tipo']), 1);
    $pdf->Cell($widths[3], 6, $pdf->convertxt($row['beb_marca']), 1);
    $pdf->Cell($widths[4], 6, $pdf->convertxt($row['beb_precio']), 1);
    $pdf->Cell($widths[5], 6, $pdf->convertxt($row['beb_cantidad']), 1);
    $pdf->Cell($widths[6], 6, $pdf->convertxt($row['beb_proveedor']), 1);
    $pdf->Cell($widths[7], 6, $pdf->convertxt($row['beb_codigo_barra']), 1);
    $pdf->Cell($widths[8], 6, $pdf->convertxt($row['beb_volumen']), 1);
    $pdf->Cell($widths[9], 6, $pdf->convertxt($row['beb_calorias']), 1);
    $pdf->Cell($widths[10], 6, $pdf->convertxt($row['beb_azucar']), 1);
    $pdf->Cell($widths[11], 6, $pdf->convertxt($row['beb_alcohol']), 1);
    $pdf->Cell($widths[12], 6, $pdf->convertxt($row['beb_ingredientes']), 1);
    $pdf->Cell($widths[13], 6, $pdf->convertxt($row['beb_descripcion']), 1);
    $pdf->Cell($widths[14], 6, $pdf->convertxt($row['beb_stock']), 1);
    $pdf->Cell($widths[15], 6, $pdf->convertxt($row['beb_sabor']), 1);
    $pdf->Ln();
}

$pdf->Output();
?>
