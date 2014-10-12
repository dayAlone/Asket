<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Аскет-Авто');
$APPLICATION->IncludeComponent("bitrix:news.list", "tabs_index", 
array(
  "IBLOCK_ID"   => 6,
  "NEWS_COUNT"  => "99",
  "SORT_BY1"    => "SORT",
  "SORT_ORDER1" => "ASC",
  "DETAIL_URL"  => "/catalog/#ELEMENT_CODE#/",
  "PROPERTY_CODE"  => array("ELEMENTS"),
  "CACHE_TYPE"  => "A",
  "SET_TITLE"   => "N"
   ),
   false
);
?>
<div class="frame clearfix">
  <div class="row">
    <div class="col-md-6 col-xs-6">
      <?
        $APPLICATION->IncludeComponent("bitrix:news.list", "faq_index", 
        array(
          "IBLOCK_ID"   => 5,
          "NEWS_COUNT"  => "1",
          "SORT_BY1"    => "SORT",
          //"PREVIEW_TRUNCATE_LEN" => 145,
          "SORT_ORDER1" => "ASC",
          "DETAIL_URL"  => "/faq/",
          "CACHE_TYPE"  => "A",
          "SET_TITLE"   => "N",
          "PROPERTY_CODE"  => array("AUTHOR"),
           ),
           false
        );
      ?>
    </div>
    <div class="col-md-6 col-xs-6">
      <?
        $APPLICATION->IncludeComponent("bitrix:news.list", "leasing_index", 
        array(
          "IBLOCK_ID"   => 7,
          "NEWS_COUNT"  => "100",
          "SORT_BY1"    => "SORT",
          "SORT_ORDER1" => "ASC",
          "DETAIL_URL"  => "/leasing/",
          "CACHE_TYPE"  => "A",
          "SET_TITLE"   => "N",
          "PROPERTY_CODE"  => array("LINK"),
           ),
           false
        );
      ?>
      
    </div>
  </div>
</div>
<?
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
$APPLICATION->IncludeComponent("bitrix:news.list", "features_index", 
array(
  "IBLOCK_ID"   => 4,
  "NEWS_COUNT"  => "999",
  "SORT_BY1"    => "SORT",
  "SORT_ORDER1" => "DESC",
  "PROPERTY_CODE"  => array("TITLE"),
  "DETAIL_URL"  => "/news/#ELEMENT_CODE#/",
  "CACHE_TYPE"  => "A",
  "SET_TITLE"   => "N"
   ),
   false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>