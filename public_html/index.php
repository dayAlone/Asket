<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Аскет-Авто');

$APPLICATION->IncludeComponent("bitrix:news.list", "news_index", 
array(
	"IBLOCK_ID"   => 2,
	"NEWS_COUNT"  => "3",
	"SORT_BY1"    => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"DETAIL_URL"  => "/news/#ELEMENT_CODE#/",
	"CACHE_TYPE"  => "A",
	"SET_TITLE"   => "N"
   ),
   false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>