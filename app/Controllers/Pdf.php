<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json,text/html; charset=utf-8');

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\I18n\Time;
use TCPDF;

class Pdf extends Controller
{
	public function pruebapdf()
	{
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// Esto es para proteger el documento
		$pdf->SetProtection(array('print', 'copy'), '', null, 0, null);

// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// ---------------------------------------------------------

// set default font subsetting mode
		$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

// Set some content to print
		$html = <<<EOD
		<table class="table table-striped table-bordered display row-border order-column nowrap table-hover table-info" style="width:100%">
		<thead class="bg-info text-white">
		<tr>
		<th>Equipo</th>
		<th>Calculado</th>
		<th>Corregido</th>
		</tr>
		</thead>
		<tbody class="border border-info">
		<tr>
		<td align="center">Equipo T6 - A2-1</td>
		<td align="center" id="E139"></td>
		<td align="center" id="F139"></td>
		</tr>
		<tr>
		<td align="center">Equipo T6 - A2-2</td>
		<td align="center" id="E140"></td>
		<td align="center" id="F140"></td>
		</tr>
		<tr>
		<td align="center">Equipo T6 - A2-3</td>
		<td align="center" id="E141"></td>
		<td align="center" id="F141"></td>
		</tr>
		<tr>
		<td align="center">Equipo T6 - A2-4</td>
		<td align="center" id="E142"></td>
		<td align="center" id="F142"></td>
		</tr>
		<tr>
		<td align="center">Equipo T6 - A2-5</td>
		<td align="center" id="E143"></td>
		<td align="center" id="F143"></td>
		</tr>
		<tr>
		<td align="center" rowspan="2">Equipo T6 - A2-5</td>
		<td align="center" id="E144"></td>
		<td align="center" id="F144"></td>
		</tr>
		<tr>
		<td align="center">Balanceado</td>
		<td align="center">Balanceado</td>
		</tr>
		</tbody>
		</table>
EOD;

// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
		$pdf->Output('ejemploprueba.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
	}
} 