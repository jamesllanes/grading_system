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
$pdf->SetTitle('IT Infrastructure of Health Center Information System');
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
$pdf->Cell(0, 0, 'ACCOMPLISHED REPORT 2016 (SEMI-ANNUAL)', 0, 1, 'C');
$pdf->Cell(0, 10, 'ENVIRONMENTAL SANITATION SECTION', 0, 1, 'C');

// -----------------------------------------------------------------------------

require("include/conn.php");
// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
$tbl = <<<EOD
<table align="center" border="1" cellpadding="2" cellspacing="">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="310" align="center"><b>ACTIVITIES</b></td>
  <td width="100" align="center"><b>TOTAL NUMBER ACCOMPLISHED</b></td>
 </tr>

</thead>

 <tr>
  <td width="310" align="left"><b>A. Provision of Water Supply</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>&nbsp;&nbsp;&nbsp;H/H w/access to improve or safe water supply</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>&nbsp;&nbsp;&nbsp;Level I - Private</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>&nbsp;&nbsp;&nbsp;Level II - </b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>&nbsp;&nbsp;&nbsp;Level III - Public</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    - Private</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b></b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>Inspection of Water Supply Sources</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Water Samples Collection (WRS)</b></td>
  <td width="100" align="center"><b>100</b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Water Samples Found Positive of E. Coli</b></td>
  <td width="100" align="center"><b>11</b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b></b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>B. Provision of Sanitary Facilities</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>* Sanitary Toilet Inspection</b></td>
  <td width="100" align="center"><b>321</b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* H/H w/Complete Basic Sanitary Facilities</b></td>
  <td width="100" align="center"><b>235</b></td> 
 </tr>

<tr>
  <td width="310" align="left"><b>* Inspection of H/H w/o Sanitary Toilets to follow-up to campaign for construction</b></td>
  <td width="100" align="center"><b>86</b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b></b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>C. Food Sanitation</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Food Establishment Inspection</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Non-Food Establishment Inspection</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Issuance of Sanitary Permit</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Issuance of Health Certificate to Food Handlers</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Issuance of Health Certificate to Non-Food Handlers</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>
 
 <tr>
  <td width="310" align="left"><b>* Condut Food Safety Seminar to Food Handlers</b></td>
  <td width="100" align="center"><b></b></td> 
 </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');



// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE                                                 
//============================================================+
?>
