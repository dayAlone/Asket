<div class="years">
	<a href="<?=SITE_URL?>/news/" class="years-link <?=(intval($arParams["CACHE_NOTES"])>0?'':'years-link__active')?>">Все новости</a>
	<?foreach ($arResult['SECTIONS'] as $key => $item):?>
		<a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>" class="years-link <?=($arParams["CACHE_NOTES"]==$item['ID']?'years-link__active':'')?>"><?=$item['NAME']?></a>
	<?endforeach;?>
</div>