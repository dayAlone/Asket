<?$this->setFrameMode(true);?>
<div class="faq-list">
  <?foreach ($arResult['ITEMS'] as $item):?>
    <div class="faq-list_item">
      <div class="row">
        <div class="col-md-2 col-xs-2">
          <div class="faq-list_item-date"><?=r_date($item['ACTIVE_FROM'])?></div>
        </div>
        <div class="col-md-6 col-xs-6">
          <div class="faq-list_item-author">Вопрос от <?=$item['PROPERTIES']['AUTHOR']['VALUE']?>:</div>
        </div>
      </div>
      <div class="faq-list_item-title"><?=$item['NAME']?></div><a href="#" class="faq-list_item-trigger"><span class="shown">Показать ответ</span><span class="hiden">Скрыть ответ</span></a>
      <div class="faq-list_item-text">
        <p><?=$item['PREVIEW_TEXT']?></p>
      </div>
    </div>
  <?endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>
<?$this->SetViewTarget('after_title');?>
<a data-toggle="modal" href="#sendFaq" data-target="#sendFaq" class="ask top">Задать свой вопрос</a>
<?$this->EndViewTarget();?> 