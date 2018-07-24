<?php
	require("include/conn.php");
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
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage('P');
$pdf->Cell(0,12,"List of Student Grades Per Section",0,1, 'P');

// -----------------------------------------------------------------------------
require("include/connect2.php");
// -----------------------------------------------------------------------------

session_start();

$Course_Code=$_REQUEST[Course_Code];
$_SESSION[Course_Code]=$Course_Code;
$Course_Code=$_SESSION[Course_Code];

$section=$_REQUEST[section];
$_SESSION[section]=$section;
$section_name=$_SESSION[section];

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
$tblbody = '
<table border="1" cellpadding="1" cellspacing="1" align="center">
 <tr nobr="true">
  <th colspan="3"><b>CLASS LIST</b></th>
 </tr>
  <tr nobr="true">
  <td width="49.5%">Course Code '.$Course_Code.' </td><td width="50.5%">Section '.$section_name.'</td>
 </tr>
 <tr nobr="true">
 <td width="20%">No.</td>
  <td width="20%">Student No</td>
   <td width="25%">Last Name</td>
   <td width="30%">First Name</td>
 </tr>';
$i=1;
$query = mysql_query("SELECT * FROM students WHERE section= '$section_name' ORDER BY lastname ASC");
while($row = mysql_fetch_array($query))
{
	$studno=$row[studno];
	$lastname=$row[lastname];
	$firstname=$row[firstname];

	$tblgrades .= '<tr>
	<td width="20%">'.$i.'</td>
	<td width="20%">'.$studno.'</td>
	<td width="25%">'.$lastname.'</td>
	<td width="30%">'.$firstname.'</td>
	</tr>';
	$i++;
}
'</table>';
$pdf->writeHTML($tblbody . $tblgrades, true, false, false, false, '');

// -----------------------------------------------------------------------------
//Change To Avoid the PDF Error
  ob_end_clean();
//Close and output PDF document
$pdf->Output('example_048.pdf', 'I', $output_dest);

//============================================================+
// END OF FILE                                                 
//============================================================+
?>
