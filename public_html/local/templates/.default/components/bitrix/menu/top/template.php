<?$this->setFrameMode(true);?>
<nav class="navbar">
  <div class="row no-padding">
    <div class="col-md-12 col-xs-12">
    	<?foreach ($arResult as $key=>$item):?>
			<a href="<?=SITE_URL?><?=$item['LINK']?>" class="navbar-item <?=($item['PARAMS']['DROPDOWN']?'navbar-item--dropdown':'')?> <?=($item['SELECTED']?'navbar-item--active':'')?>"><?=$item['TEXT']?></a>
		<?endforeach;?>
    </div>
    <?$APPLICATION->ShowViewContent('nav');?>
  </div>
</nav>