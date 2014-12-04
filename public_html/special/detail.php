<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', "special");
if(strlen($_REQUEST['ELEMENT_CODE'])>0):
	$APPLICATION->IncludeComponent("bitrix:news.detail","special",Array(
		"IBLOCK_ID"     => 9,
		"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		"CHECK_DATES"   => "N",
		"IBLOCK_TYPE"   => "content",
		"FIELD_CODE"    => array("PREVIEW_TEXT"),
		"PROPERTY_CODE" => array("ELEMENTS"),
		"SET_TITLE"     => "Y",
		"CACHE_TYPE"    => "A",
		"COLS"          => 3
	));
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>