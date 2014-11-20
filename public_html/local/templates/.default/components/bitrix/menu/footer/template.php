<?$this->setFrameMode(true);?>
<nav class="catalog-sections">
  <div class="container">
    <div class="row">
	    <?
		foreach ($arResult as $key=>$item):
			switch ($item['DEPTH_LEVEL']) {
				case 1:
					if(isset($arResult[$key-1]['DEPTH_LEVEL'])){?></div><?}?>
					<div class="col-xs-4">
						<a href="<?=SITE_URL?><?=$item['LINK']?>" class="catalog-sections_title"><?=$item['TEXT']?></a>
					<?
					break;
				
				case 2:
					?><a href="<?=SITE_URL?><?=$item['LINK']?>" class="catalog-sections_link"><?=$item['TEXT']?></a><?
					break;
			}
		endforeach;
		?>
		</div>	
    </div>
    
    </div>
    <div class="catalog-sections_call">
    	<span>Свяжитесь с нами: <br></span>
    	<a href="tel:<?=preg_replace('/[^\dx+]/i', '', COption::GetOptionString("grain.customsettings","contacts_phone"))?>"><?=COption::GetOptionString("grain.customsettings","contacts_phone")?>
    	<br></a>
    	<span>E-mail: </span><a href="mailto:<?=COption::GetOptionString("grain.customsettings","contacts_email")?>"><?=COption::GetOptionString("grain.customsettings","contacts_email")?></a>
    </div>
</nav>