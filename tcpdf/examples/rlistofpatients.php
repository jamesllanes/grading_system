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
$pdf->SetAuthor('Jessie James Llanes');
$pdf->SetTitle('DLSL Grading System');
$pdf->SetSubject('Grading System');
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
$pdf->Cell(0, 12, 'List of Patients', 0, 1, 'L');

// -----------------------------------------------------------------------------

require("include/conn.php");
// -----------------------------------------------------------------------------

// Set some content to print
$tbl_header = '<table border=1 width=60% style="margin-left:230px;margin-top:50px">';

$tbl_footer = '</table>';
$tbl ='';
$tbl1 ='';

$tbl1 .= '<tr><td>Course Code</td><td>"'.$Course_Code.'"</td>
		<td>Section</td><td>"'.$section_name.'"</td></tr>
		<tr><th colspan=24>List of Students<br></th></tr>		
		<th>No.</th>
		<th>Student Number</th>
		<th>Midterm Attendance</th>
		<th>Final Attendance</th>
		<th>Midterm Values & Behavior</th>
		<th>Final Values & Behavior</th>
		<th>Midterm Exercises</th>
		<th>Final Exercises</th>
		<th>Midterm Exercises Average</th>
		<th>Final Exercises Average</th>
		<th>Midterm Class Standing</th>
		<th>Final Class Standing</th>
		<th>Midterm Quizzes</th>
		<th>Final Quizzes</th>
		<th>Midterm Quizzes Average</th>
		<th>Final Quizzes Average</th>
		<th>Midterm Exam</th>
		<th>Final Exam</th>
		<th>ME %</th>
		<th>FE %</th>
		<th>MG</th>
		<th>FG</th>
		<th>FCG</th>
		<th>Remarks</th>';

$section=$_REQUEST['section'];
$_SESSION['section']=$section;
$section_name=$_SESSION['section'];

$query="SELECT * FROM grades WHERE section_name = '$section_name'";
$result = mysqli_query($connect,$query) or die (mysqli_error($connect));
$i=0;
while($row = mysqli_fetch_array($result))
{	
	$studno=$row['studno'];
	$_SESSION['studno']=$studno;  
	 $tbl .='<tr>;
			<td><center>"'.$i++.'"</center></td>
			<td><center>"'. $row['studno'] . '"</center></td>
			<td><center>"'. $row['mattd'] . '"</center></td>
			<td><center>"'. $row['fattd'] . '"</center></td>
			<td><center>"'. $row['mvb'] . '"</center></td>
			<td><center>"'. $row['fvb'] . '"</center></td>
			<td><center>"'. $row['mexercises'] . '"</center></td>
			<td><center>"'. $row['fexercises'] . '"</center></td>
			<td><center>"'. $row['mxave'] . '"</center></td>
			<td><center>"'. $row['fxave'] . '"</center></td>
			<td><center>"'. $row['mcs'] . '"</center></td>
			<td><center>"'. $row['fcs'] . '"</center></td>
			<td><center>"'. $row['mquizzes'] . '"</center></td>
			<td><center>"'. $row['fquizzes'] . '"</center></td>
			<td><center>"'. $row['mqave'] . '"</center></td>
			<td><center>"'. $row['fqave'] . '"</center></td>
			<td><center>"'. $row['mexam'] . '"</center></td>
			<td><center>"'. $row['fexam'] . '"</center></td>
			<td><center>"'. $row['mexamp'] . '"</center></td>
			<td><center>"'. $row['fexamp'] . '"</center></td>
			<td><center>"'. $row['mg'] . '"</center></td>
			<td><center>"'. $row['fg'] . '"</center></td>
			<td><center>"'. $row['fcg'] . '"</center></td>
			<td><center>"'. $row['remarks'] . '"</center></td> 
			</tr>';
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
