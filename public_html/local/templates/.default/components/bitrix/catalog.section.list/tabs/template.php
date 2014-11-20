<?$this->setFrameMode(true);?>
<div class="tabs__title tabs__title--catalog">
  <?foreach ($arResult['SECTIONS'] as $key => $item):?>
    <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="tabs__title-link <?=($key==0?"tabs__title-link--first":"")?> <?=($key==count($arResult['SECTIONS'])-1?"tabs__title-link--last":"")?> <?=(intval($arParams["CACHE_NOTES"])==$item['ID']?'tabs__title-link--active':'')?>"><?=$item['NAME']?></a>
  <?endforeach;?>
</div>