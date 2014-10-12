<?if(count($arResult['ITEMS'])>0):?>
<div class="catalog__list" id="<?=($arParams['ID']?$arParams['ID']:"")?>">
  <?php
  $i   = 0;
  $col = 4;
  foreach ($arResult['ITEMS'] as $item) {
          $props = $item['PROPS'];
          if($i % $col == 0) {
            if ($i != 0) echo "</div>";
          echo "<div class=\"row\">";
        }
      ?>
          <div class="col-md-<?=12/$col?>">
            <a href="<?=SITE_URL?><?=$item['DETAIL_PAGE_URL']?>" class="catalog__list-item">
              <div style="background-image: url(./layout/images/p-1.jpg)" class="catalog__list-item_image"></div>
              <div class="catalog__list-item_type"><?=$props['TYPE']?></div>
              <div class="catalog__list-item_name"><?=$item['NAME']?></div>
              <div class="catalog__list-item_props">
                  <?=($props['YEAR']?"Год выпуска: ".$props['YEAR']."<br>":"")?>
                  <?=($props['STATUS']?"Состояние ".$props['STATUS']."<br>":"")?>
                  <?=($props['PRICE']?"Цена: ".($props['PRICE']/1000000)." млн. руб.<br>":"")?>
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
<?endif;?>