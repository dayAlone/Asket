<?$this->setFrameMode(true);?>
<div class="row">
        <div class="col-xs-12"><?=$arResult['PREVIEW_TEXT']?></div>
    </div>    
<div class="insert">
<?
    global $catalog_filter;
    $catalog_filter = array('=ID'=>$arResult['PROPERTIES']['ELEMENTS']['VALUE']);
    $APPLICATION->IncludeComponent("bitrix:news.list", "catalog", 
    array(
        "IBLOCK_ID"            => 1,
        "NEWS_COUNT"           => "4",
        "SORT_BY1"             => "SORT",
        "SORT_ORDER1"          => "ASC",
        "DETAIL_URL"           => "/catalog/#ELEMENT_CODE#/",
        "PROPERTY_CODE"        => array(
        1  => "YEAR",
        2  => "ENGINE",
        3  => "CABINE",
        4  => "COMPLECT",
        5  => "BODY",
        6  => "MASS",
        7  => "PLACE",
        8  => "AVAILABILITY",
        9  => "STATUS",
        10 => "TYPE",
        11 => "TRANSMISSION",
        12 => "PRICE",
        13 => "PRICE_SALE",
        14 => "CHASSIS",
        15 => "PRICE_ORDER",
        16 => "SALE_TEXT"
        ),
        "DISPLAY_BOTTOM_PAGER" => "N",
        'SHOW_SALE' => "Y",
        "FILTER_NAME"          => "catalog_filter",
        "CACHE_FILTER"         => "Y",
        "CACHE_TYPE"           => "A",
        "SET_TITLE"            => "N",
        "COLS"                 => 3,
        "INDEX"                => $arResult['PROPERTIES']['ELEMENTS']['VALUE']
       ),
       false
    );
  ?>
</div>

<div class="row">
        <div class="col-xs-12"><?=$arResult['DETAIL_TEXT']?></div>
    </div>    