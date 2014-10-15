<?
$item = $arResult;
$props = &$item["PROPS"];
?>
<div class="product">
  <div class="row">
    <div class="col-xs-10">
      <h1><?=$item['NAME']?></h1>
    </div>
    <div class="col-xs-2"><a href="#" class="print"><?=svg('print')?>Версия для печати</a></div>
  </div>
  <div class="row">
    <div class="col-md-4 col-xs-4 side">
        <div class="gallery">
            <div class="big">
                <?foreach ($props['PHOTOS'] as $key => $value):?>
                <a id="big-<?=$key?>" style="background-image: url(<?=$value['small']?>)" rel="prettyPhoto[]" href="<?=$value['value']?>" <?=($key==0?'class="active"':'')?>></a>
                <?endforeach;?>
            </div>
            <div class="slider">
                <?foreach ($props['PHOTOS'] as $key => $value):?>
                    <div class="item"><a style="background-image: url(<?=$value['small']?>)" data-id="big-<?=$key?>" class="image"></a></div>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-8">
        <div class="params">
            <?if(isset($props['YEAR'])):?>
            <div class="params-item">
              <div class="params-item-title">
                <div class="params-item-title_content"><?=svg('i-1')?><br> Год выпуска</div>
              </div>
              <div class="params-item-value"><?=$props['YEAR']?></div>
            </div>
            <?endif;?>
            <div class="params-item">
              <div class="params-item-title">
                <div class="params-item-title_content"><?=svg('i-2')?><br> Состояние
                </div>
              </div>
              <div class="params-item-value">Новый</div>
            </div>
            <div class="params-item">
              <div class="params-item-title">
                <div class="params-item-title_content"><?=svg('i-3')?><br> Наработка
                </div>
              </div>
              <div class="params-item-value">123 488 км.</div>
            </div>
            <div class="params-item">
              <div class="params-item-title">
                <div class="params-item-title_content"><?=svg('i-4')?><br> Нахождение
                </div>
              </div>
              <div class="params-item-value">Владивосток</div>
            </div>
            <div class="params-item">
              <div class="params-item-title">
                <div class="params-item-title_content"><?=svg('i-5')?><br> Наличие
                </div>
              </div>
              <div class="params-item-value">В наличии</div>
            </div>
          </div>
    </div>
  </div>
</div>