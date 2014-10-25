<?$this->setFrameMode(true);?>
<section class="dropdown__catalog">
  <a href="/catalog/" class="dropdown__catalog-trigger">Каталог техники</a>
  <div class="dropdown__catalog-frame">
    <?
    $s = 0;
    foreach ($arResult['SECTIONS'] as $key => $item):?>
      <?
        switch ($item['DEPTH_LEVEL']):
          case '1':
            if(isset($arResult['SECTIONS'][$key-1])):?>
              </div></div>
            <?
              if($arResult['SECTIONS'][$key-1]['DEPTH_LEVEL']==2):?></div><?
                $s = 0;
              endif;
            endif;?>
            <div class="row">
              <div class="col-md-12">
                <h4 class="dropdown__catalog-title"><a href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>"><?=$item['NAME']?></a></h4>
            <?
              if(!isset($arResult['SECTIONS'][$key+1])):?></div></div><?endif;
            break;
          case '2':
            if($arResult['SECTIONS'][$key-1]['DEPTH_LEVEL']==1||($s%4==0)):
                if($s!=0){?></div><?}
                ?>
                <div class="row">
              <?endif;?>
              <div class="col-md-3 col-xs-3">
                <a class="dropdown__catalog-item" href="<?=SITE_URL?><?=$item['SECTION_PAGE_URL']?>">
                  <div style="background-image: url(<?=$item['PICTURE']['SRC']?>)" class="dropdown__catalog-item_image"></div>
                  <div class="dropdown__catalog-item_title"><?=$item['NAME']?></div>
                </a>
              </div>
          <?
            $s++;
            if(!isset($arResult['SECTIONS'][$key+1])):?></div></div></div><?endif;
          break;
        endswitch;
      ?>
    <?endforeach;?>
  </div>
</section>