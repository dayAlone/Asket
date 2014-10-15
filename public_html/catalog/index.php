<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Каталог');

if(strlen($_REQUEST['ELEMENT_CODE'])>0 && !isset($_GLOBALS['currentCatalogInnerSection']) && !isset($_GLOBALS['currentCatalogSection'])):
	$APPLICATION->SetPageProperty('page_title', 'Каталог');
	$APPLICATION->IncludeComponent("bitrix:news.detail","catalog",Array(
		"IBLOCK_ID"     => 1,
		"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		"CHECK_DATES"   => "N",
		"IBLOCK_TYPE"   => "content",
		"SET_TITLE"     => "Y",
		"CACHE_TYPE"    => "A",
		"CACHE_TIME"    => "36000",
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
          16 => "PHOTOS"
        ),
	));
elseif(strlen($_REQUEST['ELEMENT_CODE'])>0 && isset($_GLOBALS['currentCatalogInnerSection'])):
	$APPLICATION->IncludeComponent("bitrix:news.list", "catalog", 
      array(
        "IBLOCK_ID"   => 1,
        "NEWS_COUNT"  => "20",
        "SORT_BY1"    => (isset($_SESSION["SORT_BY1"])?$_SESSION["SORT_BY1"]:"PROPERTY_PRICE"),
        "SORT_ORDER1" => (isset($_SESSION["SORT_ORDER1"])?$_SESSION["SORT_ORDER1"]:"DESC"),
        "SHOW_FILTER" => "Y",
        "DETAIL_URL"  => "/catalog/#ELEMENT_CODE#/",
        "PARENT_SECTION"  => $_GLOBALS['currentCatalogInnerSection']['ID'],
        "SECTION_NAME" => $_GLOBALS['currentCatalogInnerSection']['NAME'],
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
          15 => "DEPRECIATION"
        ),
        "CACHE_FILTER"  => "Y",
        "CACHE_TYPE"  => "A",
        "SET_TITLE"   => "N",
        "COLS"        => 3
         ),
         false
      );
elseif(strlen($_REQUEST['ELEMENT_CODE'])>0 && isset($_GLOBALS['currentCatalogSection'])):
	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "catalog", array(
	        "IBLOCK_TYPE"  => "content",
	        "IBLOCK_ID"    => "1",
	        "SECTION_ID"   => $_GLOBALS['currentCatalogSection'],
	        "SECTION_CODE" => "",
	        "TOP_DEPTH"    => "2",
	        "CACHE_TYPE"   => "A",
	        "CACHE_TIME"   => "36000",
	        "CACHE_NOTES"  => $_REQUEST['ELEMENT_CODE'],
	        "SECTION_USER_FIELDS" => array("UF_SVG"),
	    ),
	    false
	  );
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>