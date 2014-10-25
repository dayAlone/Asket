<?$this->setFrameMode(true);?>
<div class="tabs">
  <div class="tabs__frame clearfix">
    <div class="tabs__title">
      <?foreach ($arResult['ITEMS'] as $key=>$item):?>
        <a data-href="#<?=$item['CODE']?>" class="tabs__title-link <?=($key==0?"tabs__title-link--active":"")?>"><?=$item['NAME']?></a>
      <?endforeach;?>
      <?foreach ($arResult['ITEMS'] as $key=>$item):?>
        <?
          if(is_array($item['PROPERTIES']['ELEMENTS']['VALUE'])):?>
          <div class="tabs__content <?=($key==0?"tabs__content--active":"")?>" id="<?=$item['CODE']?>">
          <?
            global $catalog_filter;
            $catalog_filter = array('=ID'=>$item['PROPERTIES']['ELEMENTS']['VALUE']);
            $APPLICATION->IncludeComponent("bitrix:news.list", "catalog", 
            array(
              "IBLOCK_ID"   => 1,
              "NEWS_COUNT"  => "4",
              "SORT_BY1"    => "SORT",
              "SORT_ORDER1" => "ASC",
              "DETAIL_URL"  => "/catalog/#ELEMENT_CODE#/",
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
                15 => "PRICE_ORDER"
              ),
              "DISPLAY_BOTTOM_PAGER" => "N",
              "FILTER_NAME" => "catalog_filter",
              "CACHE_FILTER"  => "Y",
              "CACHE_TYPE"  => "A",
              "SET_TITLE"   => "N"
               ),
               false
            );
          ?>
          </div>
          <?endif;
        ?>
      <?endforeach;?>
    </div>
  </div>
</div>