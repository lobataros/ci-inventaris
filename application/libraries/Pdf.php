<?php

require_once('./vendor/dompdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf extends Dompdf {

	function create($html, $filename='', $stream=true, $paper='A4', $ori='portrait')
	{
		$pdf = new Dompdf;
		$pdf->loadHtml($html);
		$pdf->setPaper($paper);
		$pdf->render();

		($stream) ? $pdf->stream($filename.'.pdf', array('Attachment'=>0)) : $pdf->output();
	}

}