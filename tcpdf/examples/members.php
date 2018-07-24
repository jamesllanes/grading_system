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
$pdf->Cell(0, 12, 'List of Members', 0, 1, 'L');

// -----------------------------------------------------------------------------

require("include/conn.php");
// -----------------------------------------------------------------------------

// Set some content to print
$tbl_header = '<table border="1" cellpadding="2">';

$tbl_footer = '</table>';
$tbl ='';
$tbl1 ='';

$tbl1 .= '<tr style="background-color:#000000;color:#FFFF00;"><td width="60">' . "Member no." . '</td><td width="80">' . "First name" . '</td><td width="80">' . "Last name" . '</td><td width="50">' . "Gender" . '</td><td width="80">' . "Address" . '</td><td width="60">' . "Contact" . '</td><td width="50">' . "Type" . '</td><td width="60">' . "Year Level" . '</td><td width="50">' . "Status" . '</td></tr>';

$result = mysql_query("SELECT * FROM member");
while($row = mysql_fetch_array($result))
{
//     $index = $row['member'];
	 $member_id = $row['member_id'];
	 $firstname = $row['firstname'];
	 $lastname = $row['lastname'];
	 $gender = $row['gender'];
	 $address = $row['address'];
	 $contact = $row['contact'];
	 $type = $row['type'];
	 $year_level = $row['year_level'];
	 $status= $row['status'];
	 
	 $tbl .= '<tr><td width="60">' . $member_id . '</td><td width="80">' . $firstname . '</td><td width="80">' . $lastname . '</td><td width="50">' . $gender . '</td><td width="80">' . $address . '</td><td width="60">' . $contact . '</td><td width="50">' . $type . '</td><td width="60">' . $year_level . '</td><td width="50">' . $status. '</td></tr>';
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
