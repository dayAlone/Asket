<?
//error_reporting(0);
ini_set('xdebug.max_nesting_level', 20000); 
set_time_limit(0);
include($_SERVER['DOCUMENT_ROOT']."/include/pdf/mpdf.php");
$html = "тест";

$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$mpdf->Output();
?>