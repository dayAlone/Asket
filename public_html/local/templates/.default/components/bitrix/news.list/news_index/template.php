<div class="frame clearfix fixed-height">
  <div class="row">
  	<?foreach ($arResult['ITEMS'] as $item):?>
	<div class="col-md-4 col-xs-4">
      <div class="block"><small class="date"><?=r_date($item['ACTIVE_FROM'])?></small><br>
        <p><a href="<?=SITE_URL?><?=$item['DETAIL_PAGE_URL']?>" class="title"><?=$item['NAME']?></a></p>
        <p class="gray"><?=$item['PREVIEW_TEXT']?></p>
      </div>
    </div>
	<?endforeach;?>
    
  </div>
</div>