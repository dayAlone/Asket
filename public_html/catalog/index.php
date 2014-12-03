<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Каталог');
if(strlen($_REQUEST['ELEMENT_CODE'])>0 && !isset($_GLOBALS['currentCatalogInnerSection']) && !isset($_GLOBALS['currentCatalogSection'])):
	$APPLICATION->SetPageProperty('page_title', 'Каталог');
	$APPLICATION->IncludeComponent("bitrix:news.detail","catalog".(isset($_REQUEST['pdf'])?"_pdf":""),Array(
		"IBLOCK_ID"     => 1,
		"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		"CHECK_DATES"   => "N",
		"IBLOCK_TYPE"   => "content",
		"SET_TITLE"     => "Y",
		"CACHE_TYPE"    => "A",
		"CACHE_TIME"    => "36000",
    "FIELD_CODE"    => array("PREVIEW_TEXT"),
    "PROPERTY_CODE" => array(
          1 => "YEAR",
          2 => "ENGINE",
          3 => "CABINE",
          4 => "COMPLECT",
          5 => "BODY",
          6 => "MASS",
          7 => "PLACE",
          8 => "AVAILABILITY",
          9 => "STATUS",
          10 => "TYPE",
          11 => "TRANSMISSION",
          12 => "PRICE",
          13 => "PRICE_SALE",
          14 => "CHASSIS",
          15 => "DEPRECIATION",
          16 => "PHOTOS",
          17 => "WORK",
          18 => "PRICE_ORDER"
        ),
	));
elseif(strlen($_REQUEST['ELEMENT_CODE'])>0 && is_array($_GLOBALS['currentCatalogInnerSection'])):
  global $filter;
  if($_SESSION[$_REQUEST['ELEMENT_CODE'].'_SORT_BY1'] != 'PROPERTY_PRICE')
  {
    if($_SESSION[$_REQUEST['ELEMENT_CODE']."_SORT_ORDER1"] != 'DESC')
      $filter = array('=PROPERTY_AVAILABILITY' => "33");
    else
      $filter = array('!=PROPERTY_AVAILABILITY' => "33");
  }
  $APPLICATION->IncludeComponent("bitrix:news.list", "catalog", 
      array(
        "IBLOCK_ID"            => 1,
        "FILTER_NAME"          => "filter",
        "NEWS_COUNT"           => "21",
        "SORT_BY1"             => (isset($_SESSION[$_REQUEST['ELEMENT_CODE']."_SORT_BY1"])?$_SESSION[$_REQUEST['ELEMENT_CODE']."_SORT_BY1"]:"PROPERTY_AVAILABILITY"),
        "SORT_ORDER1"          => (isset($_SESSION[$_REQUEST['ELEMENT_CODE']."_SORT_ORDER1"])?$_SESSION[$_REQUEST['ELEMENT_CODE']."_SORT_ORDER1"]:"ASC"),
        "SHOW_FILTER"          => "Y",
        "DETAIL_URL"           => "/catalog/#ELEMENT_CODE#/",
        "PARENT_SECTION"       => $_GLOBALS['currentCatalogInnerSection']['ID'],
        "SECTION_NAME"         => $_GLOBALS['currentCatalogInnerSection']['NAME'],
        "PHONE"                => $_GLOBALS['currentCatalogInnerSection']['PHONE'],
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PROPERTY_CODE" => array(
          1 => "YEAR",
          2 => "ENGINE",
          3 => "CABINE",
          4 => "COMPLECT",
          5 => "BODY",
          6 => "MASS",
          7 => "PLACE",
          8 => "AVAILABILITY",
          9 => "STATUS",
          10 => "TYPE",
          11 => "TRANSMISSION",
          12 => "PRICE",
          13 => "PRICE_SALE",
          14 => "CHASSIS",
          15 => "DEPRECIATION",
          16 => "PRICE_ORDER",
          17 => "PROTECTOR"
        ),
        "CACHE_FILTER" => "Y",
        "CACHE_TYPE"   => "A",
        "SET_TITLE"    => "N",
        "COLS"         => 3
         ),
         false
      );
elseif(isset($_GLOBALS['currentCatalogSection'])):
	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "catalog", array(
          "IBLOCK_TYPE"         => "content",
          "IBLOCK_ID"           => "1",
          "SECTION_ID"          => ($_GLOBALS['currentCatalogInnerSection']?$_GLOBALS['currentCatalogInnerSection']:$_GLOBALS['currentCatalogSection']),
          "SECTION_CODE"        => "",
          "TOP_DEPTH"           => "1",
          "CACHE_TYPE"          => "A",
          "SET_TITLE"           => "N",
          "CACHE_TIME"          => "36000",
          "CACHE_NOTES"         => $_REQUEST['ELEMENT_CODE'],
          "SECTION_USER_FIELDS" => array("UF_SVG", "UF_TITLE"),
	    ),
	    false
	  );
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>