<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2009-09-30
// 
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
// 
// Author: Nicola Asuni
// 
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @copyright 2004-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @since 2009-03-20
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('EventsMG.ph: Cloud Based Events Management Information System');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 7);

// add a page
$pdf->AddPage();
// print a line using Cell()
$pdf->Cell(0, 12, 'Borrowed books details', 0, 1, 'L');

// -----------------------------------------------------------------------------

require("include/conn.php");
// -----------------------------------------------------------------------------

// Set some content to print
$tbl_header = '<table border="1" cellpadding="2">';

$tbl_footer = '</table>';
$tbl ='';
$tbl1 ='';

$tbl1 .= '<tr style="background-color:#000000;color:#FFFF00;"><td width="90">' . "Borrow Detail ID" . '</td><td width="90">' . "Book ID" . '</td><td width="90">' . "Borrow ID " . '</td><td width="120">' . "Borrow Status" . '</td><td width="120">' . "Date Return" . '</td></tr>';

$result = mysql_query("SELECT * FROM borrowdetails");
while($row = mysql_fetch_array($result))
{
//     $index = $row['borrowdetails'];
	 $borrow_details_id = $row['borrow_details_id'];
	 $book_id = $row['book_id'];
	 $borrow_id = $row['borrow_id'];
	 $borrow_status = $row['borrow_status'];
	 $date_return = $row['date_return'];
	 
	 
	 $tbl .= '<tr><td width="90">' . $borrow_details_id . '</td><td width="90">' . $book_id . '</td><td width="90">' . $borrow_id . '</td><td width="120">' . $borrow_status . '</td><td width="120">' . $date_return . '</td></tr>';
}
// Print text using writeHTMLCell()
$pdf->writeHTML($tbl_header . $tbl1 . $tbl .  $tbl_footer, true, false, false, false, '');



// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE                                                 
//============================================================+
?>
