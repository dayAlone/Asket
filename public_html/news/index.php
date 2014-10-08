<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/include/news.php');
$APPLICATION->SetTitle('Новости');
if(strlen($_REQUEST['ELEMENT_CODE'])>0 && !isset($_GLOBALS['currentNewsSection'])):
	$APPLICATION->SetPageProperty('page_title', 'Новости');
	$APPLICATION->IncludeComponent("bitrix:news.detail","news",Array(
		"IBLOCK_ID"     => 2,
		"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		"CHECK_DATES"   => "N",
		"IBLOCK_TYPE"   => "content",
		"SET_TITLE"     => "Y",
		"CACHE_TYPE"    => "A",
		"CACHE_TIME"    => "3600",
	));
else:
	
	$APPLICATION->IncludeComponent("bitrix:news.list", "news", 
	array(
		"IBLOCK_ID"      => 2,
		"NEWS_COUNT"     => "15",
		"PARENT_SECTION" => $_GLOBALS['currentNewsSection'],
		"SORT_BY1"       => "ACTIVE_FROM",
		"SORT_ORDER1"    => "DESC",
		"DETAIL_URL"     => "/news/#ELEMENT_CODE#/",
		"CACHE_TYPE"     => "A",
		"SET_TITLE"      => "N"
	),
	false
	);
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>