<?
error_reporting(0);
ini_set('xdebug.max_nesting_level', 20000); 
set_time_limit(0);
include($_SERVER['DOCUMENT_ROOT']."/include/pdf/mpdf.php");
$html = file_get_contents('http://asket.radia.ru/catalog/avtokran-ivanovets-ks-45717k-3r-ovoid/?pdf=1');

$mpdf=new mPDF(); 
$mpdf->WriteHTML($html);
$mpdf->Output();
?>