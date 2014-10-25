<?$this->setFrameMode(true);?>
<div class="news-list">
  <?foreach ($arResult['ITEMS'] as $item):?>
    <div class="news-list_item">
      <div class="news-list_item-date"><?=r_date($item['ACTIVE_FROM'])?></div>
      <a href="<?=SITE_URL?><?=$item['DETAIL_PAGE_URL']?>" class="news-list_item-title"><?=$item['NAME']?></a>
      <p class="news-list_item-text"><?=$item['PREVIEW_TEXT']?></p>
    </div>
  <?endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>
<?$this->SetViewTarget('title');
$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "years", array(
    "IBLOCK_TYPE"  => "content",
    "IBLOCK_ID"    => "2",
    "SECTION_ID"   => "",
    "SECTION_CODE" => "",
    "TOP_DEPTH"    => "2",
    "CACHE_TYPE"   => "A",
    "CACHE_TIME"   => "36000",
    "CACHE_NOTES"  => $arParams['PARENT_SECTION']
),
false
);
$this->EndViewTarget();?> 