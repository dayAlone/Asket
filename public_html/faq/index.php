<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Ваши вопросы о технике');

$APPLICATION->IncludeComponent("bitrix:news.list", "faq", 
array(
	"IBLOCK_ID"   => 5,
	"NEWS_COUNT"  => "10",
	"SORT_BY1"    => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
  "PROPERTY_CODE" => array('AUTHOR'),
	"DETAIL_URL"  => "/news/#ELEMENT_CODE#/",
	"CACHE_TYPE"  => "A",
	"SET_TITLE"   => "N"
   ),
   false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>