<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Аскет-Авто');
?>
<section class="promo">
  <div class="row">
    <div class="col-md-3 col-xs-3">
      <a href="/catalog/new/" data-id="#new" class="promo__banner">
        <div class="promo__banner-title">Новая<br>техника</div>
      </a>
      <a href="/catalog/used/" data-id="#used" class="promo__banner">
        <div class="promo__banner-title">Б/У <br>техника</div>
        <div class="promo__banner-description">С возможностью <br>рассрочки</div>
      </a>
    </div>
    <div class="col-md-9 col-xs-9">
      <?/*
      <div style="background-image: url(./layout/images/slider-bg.jpg)" class="resp_slider">
        <div class="content">
          <h1>Специальное предложение <br>на автокраны “Ивановец” <br>25 тонн. Скидки!</h1><a class="button">Подробнее</a>
        </div>
      </div>
      */?>
      <?$APPLICATION->IncludeComponent(
	"radia:resp_slider", 
	".default", 
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "3",
		"ENABLE_JQUERY" => "N",
		"MY_DATA" => "",
		"SIZES_HEIGHT" => "291",
		"SIZES_WIDTH" => "783",
		"EFFECT_SPEED" => "600",
		"BACKGROUND_COLOR" => "#000000",
		"DARK_COLOR" => "#000000",
		"BRIGHT_COLOR" => "#FFFFFF",
		"BUTTON_COLOR" => "#02b6ed",
		"DOTS_SHOW" => "N",
		"ARROWS_SHOW" => "Y",
		"ARROWS_TYPE" => "small",
		"ARROWS_PREVIEW_SHOW" => "N",
		"EFFECT_TYPE" => "crossfade",
		"SLIDE_AUTOPLAY" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000",
		"SLIDE_SPEED" => "4"
	),
	false
);?>
    </div>
    <?
    $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "index", array(
        "IBLOCK_TYPE"  => "content",
        "IBLOCK_ID"    => "1",
        "SECTION_ID"   => "",
        "SECTION_CODE" => "",
        "TOP_DEPTH"    => "2",
        "CACHE_TYPE"   => "A",
        "CACHE_TIME"   => "36000",
    ),
    false
    );?>
  </div>
</section>
<?
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