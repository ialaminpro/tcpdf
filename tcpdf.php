<?php
require __DIR__ . '/vendor/autoload.php';

define ('PDF_HEADER_STRING', "by Al Amin - thealamin.info\nwww.tcpdf.org");
// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Al Amin');
$pdf->SetTitle('TCPDF Example HTML Table');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <thead>
        <tr style="background-color:#FFFF00;color:#0000FF;">
            <th width="20%" align="center">COL 1 </th>
            <th width="20%" align="center">COL 2 </th>
            <th width="20%" align="center">COL 3 </th>
            <th width="20%" align="center">COL 4 </th>
            <th width="20%" align="center">COL 5 </th>
        </tr>
    </thead>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    <tr>
        <td width="20%" align="center">text line 1</td>
        <td width="20%" align="center">text line 2</td>
        <td width="20%" align="center">text line 3</td>
        <td width="20%" align="center">text line 4</td>
        <td width="20%" align="center">text line 5</td>
    </tr>
    

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('html_table.pdf');
