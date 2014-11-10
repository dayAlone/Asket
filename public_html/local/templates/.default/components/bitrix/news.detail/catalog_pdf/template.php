<?$this->setFrameMode(true);?>
<?
$item = $arResult;
$props = &$item["PROPS"];
?>
<div class="product">
  <div class="row <?=(isset($_REQUEST['pdf'])?"no-gutter":"")?>">
    <div class="<? if(!isset($_REQUEST['pdf'])):?>col-xs-10<?else:?>col-xs-12<?endif;?>">
      <h1><?=$item['NAME']?></h1>
    </div>
    <? if(!isset($_REQUEST['pdf'])):?>
    <div class="col-xs-2"><a href="#" class="print"><?=svg('print')?>Версия для печати</a></div>
    <?endif;?>
  </div>
  <div class="row <?=(isset($_REQUEST['pdf'])?"no-gutter":"")?>">
    <div class="col-xs-6 side">
        <div class="gallery">
            <div class="big">
              <img src="<?=$props['PHOTOS'][0]['value']?>" alt="" width="100%">
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="params">
            <?
              $list = array(
                "YEAR"         => array("icon"=>1, "name"=> "Год выпуска"),
                "STATUS"       => array("icon"=>2, "name"=> "Состояние"),
                "WORK"         => array("icon"=>3, "name"=> "Наработка"),
                "PLACE"        => array("icon"=>4, "name"=> "Нахождение"),
                "AVAILABILITY" => array("icon"=>5, "name"=> "Наличие")
              );
              $i=1;
            ?>
            <?foreach ($list as $key => $value):?>
              <?if(isset($props[$key])):?>
                <div class="params-item">
                  <div class="params-item-title">
                    <div class="params-item-title_content"><?=svg('i-'.$value["icon"])?><br><?=$value["name"]?></div>
                  </div>
                  <div class="params-item-value"><?=$props[$key]?></div>
                </div>
              <?endif;?>
            <?endforeach;?>
        </div>
        <div class="price">
        <?
        if($props['PRICE_ORDER']!='Y'):
          if($props['PRICE_SALE']):?>
            <div class="price-title">Новая цена по акции</div>
            <div class="price-value"><?=number_format($props['PRICE_SALE'], 0, '.', ' ')?> р.</div>
            <div class="price-old"><?=number_format($props['PRICE'], 0, '.', ' ')?> р.</div>
          <?else:?>
              <div class="price-value">
                <?if(intval($props['PRICE'])>0):?>
                  <?=number_format($props['PRICE'], 0, '.', ' ')?> р.
                <?
                endif;?>
              </div>
          <?endif;
        else:
          ?><div class="price-value">По запросу</div><?
        endif;?>
            <a href="/leasing/" class="price-button">Выгодно в лизинг</a>
        </div>
        
    </div>
  </div>
  <p class="small">
    <?=$item['PREVIEW_TEXT']?>
  </p>
  <div class="sub-tabs">
            <div class="sub-tabs_title">
              <a href="#params" class="sub-tabs_title__active">Характеристики</a>
              <?if(strlen($props['DEPRECIATION']['TEXT'])>0):?><a href="#depreciation">Износ</a><?endif;?>
            </div>
            <div class="sub-tabs_content sub-tabs_content--active" id="params">
              
            <?
            $title = false;
            if(count($props['BODY'])>0):?>
              <?foreach ($props['BODY'] as $key=>$item):?>
                <?if($item['property_title']=="Y"):
                  if(!$title) $title = true;
                  if($key!=0) echo "</div>";
                  ?>
                  <div class="param-block">
                    <div class="param-block_title"><?=$item['property_name']?></div>
                  <?
                else:?>
                  <div class="row">
                    <div class="col-md-5 col-xs-5"><?=$item['property_name']?>:</div>
                    <div class="col-md-7 col-xs-7"><?=$item['property_value']?></div>
                  </div>
                <?
                endif;
                endforeach;
                if($title) echo "</div>";
            endif;
            ?>
            
              


              <?if(strlen($props['COMPLECT'])>0):?>
              <div class="param-block">
                <div class="param-block_title">Комплектация</div>
                <div class="row">
                  <div class="col-md-12 col-xs-12"><?=$props['COMPLECT']?></div>
                </div>
              </div>
              <?endif;?>
            </div>
            <?if(strlen($props['DEPRECIATION'])>0):?>
            <div class="sub-tabs_content" id="depreciation">
              <div class="param-block param-block--no-title">
                <?=$props['DEPRECIATION']?>
              </div>
            </div>
            <?endif;?>
          </div>
</div>