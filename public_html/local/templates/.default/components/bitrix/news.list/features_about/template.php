<?
  $i   = 0;
  $col = 2;
  foreach ($arResult['ITEMS'] as $key=>$item):
    if($i % $col == 0):
      if ($i != 0) echo "</div>";
      echo "<div class=\"row features_list\">";
    endif;?>
      <div class="col-md-1 center"><img src="/layout/images/n-<?=$key+1?>.png" class="number"></div>
      <div class="col-md-5">
        <p class="highlight"><strong><?=$item['NAME']?></strong></p>
        <p><?=$item['PREVIEW_TEXT']?></p>
      </div>
  <?
    $i++;
  endforeach;?>
</div>