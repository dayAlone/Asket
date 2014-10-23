<?=(isset($arParams['SECTION_NAME'])?'<div class="row--title"><div class="row"><div class="col-xs-12"><h2>'.$arParams['SECTION_NAME'].'</h2></div></div></div>':'')?>
<?if($arParams['SHOW_FILTER']=='Y'):?>
  <div class="toolbar">
    <form action="./" method="POST">
    <div class="row">
      <div class="col-md-3 col-xs-3">
        <div class="select"><img src="/layout/images/trigger.png" class="trigger">
          <select name="SORT_BY1">
            <option <?=($arParams["SORT_BY1"]=="PROPERTY_PRICE"?"selected":"")?> value="PROPERTY_PRICE">цене</option>
            <option <?=($arParams["SORT_BY1"]=="PROPERTY_AVAILABILITY"?"selected":"")?> value="PROPERTY_AVAILABILITY">наличию</option>
          </select>
        </div>
      </div>
      <div class="col-md-1 col-xs-1 no-padding">Выводить</div>
      <div class="col-md-3 col-xs-3">
        <div class="select"><img src="/layout/images/trigger.png" class="trigger">
          <select name="SORT_ORDER1">
            <option <?=($arParams["SORT_ORDER1"]=="DESC"?"selected":"")?> value="DESC">сначала большее</option>
            <option <?=($arParams["SORT_ORDER1"]=="ASC"?"selected":"")?> value="ASC">сначала меньшее</option>
          </select>
        </div>
      </div>
      <div class="col-md-5 col-xs-5 right">
        <?=$arResult["NAV_STRING"]?>
      </div>
    </div>
    </form>
  </div>
<?endif;?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="catalog__list" id="<?=($arParams['ID']?$arParams['ID']:"")?>">
  <?php
  $i   = 0;
  $col = 4;
  if(isset($arParams['COLS']))
    $col = $arParams['COLS'];
  foreach ($arResult['ITEMS'] as $item) {
          $props = $item['PROPS'];
          if($i % $col == 0) {
            if ($i != 0) echo "</div>";
          echo "<div class=\"row\">";
        }
      ?>
          <div class="col-md-<?=12/$col?>">
            <a href="<?=SITE_URL?><?=$item['DETAIL_PAGE_URL']?>" class="catalog__list-item">
              <div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="catalog__list-item_image"></div>
              <div class="catalog__list-item_type"><?=$props['TYPE']?></div>
              <div class="catalog__list-item_name"><?=$item['NAME']?></div>
              <div class="catalog__list-item_props">
                  <?=($props['YEAR']?"Год выпуска: ".$props['YEAR']."<br>":"")?>
                  <?=($props['STATUS']?"Состояние ".$props['STATUS']."<br>":"")?>
                  <?=($props['PRICE']?"Цена:":"")?>
                  <?
                  if(intval($props['PRICE'])>0):
                    if(($props['PRICE']/1000000)>1):
                      echo ($props['PRICE']/1000000)." млн. руб.<br>";
                    elseif(($props['PRICE']/1000)>1):
                      echo ($props['PRICE']/100000)." тыс. руб.<br>";
                    endif;
                  elseif($props['PRICE']):
                    echo $props['PRICE']."<br>";
                  endif;?>
                  <?=($props['PLACE']?"Местонахождение: ".$props['PLACE']."<br>":"")?>
              </div>
            </a>
          </div>
      <?
      $i++;
  }
  echo "</div>";
  ?>
</div>
<?
if($arParams['DISPLAY_BOTTOM_PAGER']=='Y'){?>
  <div class="center"><?=$arResult["NAV_STRING"]?></div> 
<?}
?>
<?endif;?>