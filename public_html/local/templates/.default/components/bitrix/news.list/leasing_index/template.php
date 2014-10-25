<?$this->setFrameMode(true);?>
<div class="block faq">
  <h3>Мы найдем решение, если у вас:</h3>
  <div class="select"><img src="./layout/images/trigger.png" class="trigger">
    <select id="leasing-select">
      <?foreach ($arResult['ITEMS'] as $item):?>
      <option value="#leasing-content-<?=$item['ID']?>"><?=$item['NAME']?></option>
      <?endforeach;?>
    </select>
  </div>
  <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <div class="leasing-content <?=($key==0?"leasing-content--active":"")?>" id="leasing-content-<?=$item['ID']?>">
      <p class="big-line-height"><?=$item['PREVIEW_TEXT']?></p>
      <p class="big-line-height"><a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>">Подробнее</a></p>    
    </div>
  <?endforeach;?>

  
</div>