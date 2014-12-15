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
    <div class="col-xs-2"><a href="http://s0s0.ru/pdf.php?url=<?=full_path()?>" target="_blank" class="print"><?=svg('print')?>Версия для печати</a></div>
    <?endif;?>
  </div>
  <div class="row <?=(isset($_REQUEST['pdf'])?"no-gutter":"")?>">
    <div class="col-xs-4 side">
        <div class="gallery">
            <div class="big">
                <?foreach ($props['PHOTOS'] as $key => $value):?>
                <a id="big-<?=$key?>" style="background-image: url(<?=$value['small']?>)" rel="prettyPhoto[]" href="<?=$value['value']?>" <?=($key==0?'class="active"':'')?>>
                  <img src="<?=$value['small']?>" alt="">
                </a>
                <?endforeach;?>
            </div>
            
            <div class="slider">
                <? if(count($props['PHOTOS'])>1):?>
                <?foreach ($props['PHOTOS'] as $key => $value):?>
                    <div class="item"><a style="background-image: url(<?=$value['small']?>)" data-id="big-<?=$key?>" class="image"></a></div>
                <?endforeach;?>
                <?endif;?>
            </div>
        </div>
        <p>
          <?=$item['PREVIEW_TEXT']?>
        </p>
    </div>
    <div class="col-xs-8">
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
        <div class="sub-tabs">
            <div class="sub-tabs_title">
              <a href="#params" class="sub-tabs_title__active">Характеристики</a>
              <?if(strlen($props['DEPRECIATION']['TEXT'])>0||count($props['PROTECTOR'])>0):?><a href="#depreciation">Износ</a><?endif;?>
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
                    <div class="col-xs-6"><?=$item['property_name']?>:</div>
                    <div class="col-xs-6"><?=$item['property_value']?></div>
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
            <?if(strlen($props['DEPRECIATION'])>0||count($props['PROTECTOR'])>0):?>
            <div class="sub-tabs_content" id="depreciation">
              <div class="row">
                <?if(count($props['PROTECTOR'])>0):?>
                <div class="col-xs-6">
                  <div class="protector">
                    <div class="protector__title">Остаток протектора:</div>
                    <?foreach ($props['PROTECTOR'] as $p):?>
                    <?
                      $html="";
                      $a=0;
                      foreach ($p as $z=>$i):
                        if(strlen($i)>0):
                          $html.='<div class="protector__item protector__item-<?=$z?>">'.$i.'%</div>';
                          $a++;
                        endif;
                      endforeach;?>
                    <div class="protector__row protector__row--count-<?=$a?>">
                      <?=$html?>
                    </div>
                    <?endforeach;?>
                  </div>
                </div>
                <div class="col-xs-6">
                <?else:?>
                <div class="col-xs-12">
                <?endif?>
                  <?if(strlen($props['DEPRECIATION'])>0):?>
                  <div class="param-block param-block--no-title">
                    <?=$props['DEPRECIATION']?>
                  </div>
                  <?endif;?>
                </div>
              </div>
              
            </div>
            <?endif;?>
          </div>
          <? if(!isset($_REQUEST['pdf'])):?>
          <?
            $rsPath = GetIBlockSectionPath($arResult['IBLOCK_ID'], $arResult['IBLOCK_SECTION_ID']);
            $arSections = array();
            while($arPath = $rsPath->GetNext())
              $arSections[] = $arPath['CODE'];
          ?>
          <a href="<?=SITE_URL?>/catalog/<?=end($arSections)?>/" class="news-list_item-back"><img src="/layout/images/back.png">Вернуться в раздел</a>
          <?endif;?>
    </div>
  </div>
</div>
<?$this->SetViewTarget('nav');
$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "nav", array(
    "IBLOCK_TYPE"  => "content",
    "IBLOCK_ID"    => "1",
    "SECTION_ID"   => "",
    "SECTION_CODE" => "",
    "TOP_DEPTH"    => "2",
    "CACHE_TYPE"   => "A",
    "CACHE_TIME"   => "36000",
    "NAME"         => $arResult['NAME'],
    "SECTIONS_LIST"=> json_encode($arSections),
    "CACHE_NOTES"  => $arParams['PARENT_SECTION']
),
false
);
$this->EndViewTarget();?> 