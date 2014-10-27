<?$this->setFrameMode(true);?>
<div class="news-list">
  <div class="news-list_item news-list_item__text">
    <div class="news-list_item-date"><?=r_date($arResult['ACTIVE_FROM'])?></div>
    <div class="news-list_item-title"><?=$arResult['NAME']?></div>
    <div class="news-list_item-text">
        <?if(strlen($arResult['DETAIL_PICTURE']['SRC'])>0):?>
        <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
        <br><br>
        <?endif;?>
    	<?=$arResult['DETAIL_TEXT']?>
    	<?
			$rsPath = GetIBlockSectionPath($arResult['IBLOCK_ID'], $arResult['IBLOCK_SECTION_ID']);
			$arPath = $rsPath->GetNext();
		?>
        <br><br>
        <a href="<?=SITE_URL?>/news/<?=$arPath['NAME']?>/" class="news-list_item-back"><img src="/layout/images/back.png">Вернуться к списку новостей</a>
    </div>
  </div>
</div>
<?
if($arPath['ID']>0)
	$_GLOBALS['currentNewsSection'] = $arPath['ID'];
$this->SetViewTarget('title');
$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "years", array(
    "IBLOCK_TYPE"  => "content",
    "IBLOCK_ID"    => "2",
    "SECTION_ID"   => "",
    "SECTION_CODE" => "",
    "TOP_DEPTH"    => "2",
    "CACHE_TYPE"   => "A",
    "CACHE_TIME"   => "36000",
    "CACHE_NOTES"  => $_GLOBALS['currentNewsSection']
),
false
);
$this->EndViewTarget();?> 