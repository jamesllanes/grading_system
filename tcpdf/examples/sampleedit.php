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
$pdf->SetTitle('DLSL Grading System');
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
$pdf->SetFont('helvetica', '', 7);

// add a page
$pdf->AddPage('L');
$pdf->Cell(0,12,"List of Student Grades Per Section",0,1, 'L');

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
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="3"><b>CLASS LIST</b></th>
 </tr>
  <tr nobr="true">
  <td width="49.5%">Course Code '.$Course_Code.' </td><td width="50.5%">Section '.$section_name.'</td>
 </tr>
 <tr nobr="true">
  <td width="7%" rowspan=2>Stud.<br />No</td>
  <td width="42.5%">Midterm</td>
  <td width="42.5%">Finals</td>
  <td width="3%" rowspan=2>FCG</td>
  <td width="3%" rowspan=2>GPE</td>
  <td width="5%" rowspan=2>Remarks</td>
 </tr>
 <tr>
  <td width="4%">Attd</td>
  <td width="5%">Values & Behavior</td>
  <td width="5%">Exercises</td>
  <td width="5%">Ave Exercises	</td>
  <td width="4.5%">Class Standing</td>
  <td width="5%">Quizzes</td>
  <td width="5%">Ave Quizzes</td>
  <td width="3.5%">Exam</td>
  <td width="3%">ME%</td>
  <td width="2.5%">MG</td>
  
  <td width="4%">Attd</td>
  <td width="5%">Values & Behavior</td>
  <td width="5%">Exercises</td>
  <td width="5%">Ave Exercises</td>
  <td width="4.5%">Class Standing</td>
  <td width="5%">Quizzes</td>
  <td width="5%">Ave Quizzes</td>
  <td width="3.5%">Exam</td>
  <td width="3%">FE%</td>
  <td width="2.5%">FG</td>
 </tr>';

$query = mysql_query("SELECT * FROM grades WHERE section_name= '$section_name' AND Course_Code = '$Course_Code'");
while($row = mysql_fetch_array($query))
{
	$studno=$row[studno];
	$mattd=$row[mattd];
	$fattd=$row[fattd];
	$mvb=$row[mvb];
	$fvb=$row[fvb];
	$mexercises=$row[mexercises];
	$fexercises=$row[fexercises];
	$mxave=$row[mxave];
	$fxave=$row[fxave];
	$mcs=$row[mcs];
	$fcs=$row[fcs];
	$mquizzes=$row[mquizzes];
	$fquizzes=$row[fquizzes];
	$mqave=$row[mqave];
	$fqave=$row[fqave];
	$mexam=$row[mexam];
	$fexam=$row[fexam];
	$mexamp=$row[mexamp];
	$fexamp=$row[fexamp];
	$mg=$row[mg];
	$fg=$row[fg];
	$fcg=$row[fcg];
	$gpe=$row[GPE];
	$remarks=$row[remarks];

	$tblgrades .= '<tr><td width="7%">'.$studno.'</td>
	<td width="4%">'.$mattd.'</td>
	<td width="5%">'.$mvb.'</td>
	<td width="5%">'.$mexercises.'</td>	
	<td width="5%">'.$mxave.'</td>
	<td width="4.5%">'.$mcs.'</td>
	<td width="5%">'.$mquizzes.'</td>
	<td width="5%">'.$mqave.'</td>
	<td width="3.5%">'.$mexam.'</td>	
	<td width="3%">'.$mexamp.'</td>
	<td width="2.5%">'.$mg.'</td>
	<td width="4%">'.$fattd.'</td>
	<td width="5%">'.$fvb.'</td>
	<td width="5%">'.$fexercises.'</td>
	<td width="5%">'.$fxave.'</td>
	<td width="4.5%">'.$fcs.'</td>
	<td width="5%">'.$fquizzes.'</td>
	<td width="5%">'.$fqave.'</td>
	<td width="3.5%">'.$fexam.'</td>
	<td width="3%">'.$fexamp.'</td>
	<td width="2.5%">'.$fg.'</td>
	<td width="3%">'.$fcg.'</td>
	<td width="3%">'.$gpe.'</td>
	<td width="5%">'.$remarks.'</td>
	</tr>';
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
