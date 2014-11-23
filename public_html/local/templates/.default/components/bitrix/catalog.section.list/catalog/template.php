<?$this->setFrameMode(true);?>
<div class="catalog-sections__side">
    <?
    foreach ($arResult['SECTIONS'] as $key => $item):?>
    <div class="row--title">
      <div class="row">
        <div class="col-xs-9">
          <h2><?=($item['UF_TITLE']?$item['UF_TITLE']:$item['NAME'])?></h2>
        </div>
        <div class="col-xs-3"><a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="button">Показать все</a></div>
      </div>
    </div>
    <?
    $APPLICATION->IncludeComponent("bitrix:news.list", "catalog", 
      array(
        "IBLOCK_ID"   => 1,
        "NEWS_COUNT"  => "3",
        "SORT_BY1"    => "SORT",
        "SORT_ORDER1" => "ASC",
        "DETAIL_URL"  => "/catalog/#ELEMENT_CODE#/",
        "PARENT_SECTION"  => $item['ID'],
        "DISPLAY_BOTTOM_PAGER" => "N",
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
        ),
        "CACHE_FILTER"  => "Y",
        "CACHE_TYPE"  => "A",
        "SET_TITLE"   => "N",
        "COLS"        => 3
         ),
         false
      );
    endforeach;?>
</div>