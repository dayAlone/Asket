<div class="catalog-sections__side">
    <?
    $s = 0;
    $z = 4;
    $count = array();
    foreach ($arResult['SECTIONS'] as $key => $item):
      switch ($item['DEPTH_LEVEL']):
        case '1':
          $count[$item['ID']] = 0;
        break;
        case '2':
          $count[$item['IBLOCK_SECTION_ID']]++;
        break;
      endswitch;
    endforeach;
    foreach ($arResult['SECTIONS'] as $key => $item):?>
      <?
        switch ($item['DEPTH_LEVEL']):
          case '1':
                if($arResult['SECTIONS'][$key-1]['DEPTH_LEVEL']==2):?></div><?
                  $s = 0;
                endif;
                if(isset($arResult['SECTIONS'][$key-1])){?></div><?
                }
                ?>
                <div id="<?=$item['CODE']?>" class="promo-slide">
            <?
            break;
          case '2':
            if($arResult['SECTIONS'][$key-1]['DEPTH_LEVEL']==1||($s%$z==0)):
                if($s!=0){?></div><?}
                ?>
                <div class="row">
            <?endif;?>
            <div class="col-xs-<?=12/$z?>">
              <a class="promo-slide-item <?=($count[$item['IBLOCK_SECTION_ID']]>8?'promo-slide-item--small':'')?>" href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>">
              <div style="background-image: url(<?=$item['PICTURE']['SRC']?>)" class="promo-slide-item_image"></div>
              <div class="promo-slide-item_title"><span><?=$item['NAME']?></span></div></a>
            </div>
           <?
           if(!isset($arResult['SECTIONS'][$key+1])){?></div><?}
           $s++;
          break;
        endswitch;
      ?>
    <?endforeach;?>
</div>