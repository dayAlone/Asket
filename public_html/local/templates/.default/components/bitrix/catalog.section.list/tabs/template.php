<?$this->setFrameMode(true);?>
<div class="tabs__title tabs__title--catalog">
  <?foreach ($arResult['SECTIONS'] as $key => $item):?>
    <a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="tabs__title-link <?=(intval($arParams["CACHE_NOTES"])==$item['ID']?'tabs__title-link--active':'')?>"><?=$item['NAME']?></a>
  <?endforeach;?>
</div>