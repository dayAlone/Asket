<?$this->setFrameMode(true);?>
<div class="frame clearfix">
  <div class="features" data-swipe="false" data-click="true" data-width="100%" data-height="360" data-loop="true" data-autoplay="true" data-click="false" data-stopautoplayontouch="false">
    <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <div class="features__item row">
      <div class="col-md-3 col-xs-3">
        <div class="features__item-content">
          <p>Наши преимущества</p>
          <div class="features__item-content_number"><img src="./layout/images/n-<?=$key+1?>.png"></div>
          <div class="features__item-content_footer">
            <h2><?=preg_replace("/\(.*?\)/","",$item['NAME'])?></h2>
            <p><?=$item['PROPERTIES']['TITLE']['VALUE']?></p>
          </div>
        </div>
      </div>
      <div class="col-md-9 col-xs-9">
        <div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="features__item-image"></div>
      </div>
    </div>
    <?endforeach;?>
  </div>
</div>