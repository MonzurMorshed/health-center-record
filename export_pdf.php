<?php
session_start();
include ("inc_classes.php");
include ("loginChk.php");
$ObjPatientRecord = new patientRecord();

$c = 1;
// Getting list of patient id
// print_r($_GET['id']);
// $idlist = implode(',', $_GET['id']);
$c .= " AND patient_id IN (" . $_GET['id'] . ")"; // condition for specific data
$patient_details = $ObjPatientRecord->patient_details($c);

include('Html2Pdf/src/Html2Pdf.php');
include('Html2Pdf/src/Exception/Html2PdfException.php');
include('Html2Pdf/src/Exception/ExceptionFormatter');

$pdf=new Html2Pdf();
$pdf->AddPage();
$strContent = 'test';
$pdf->WriteHTML($strContent);
$pdf->Output("data.pdf",'F');