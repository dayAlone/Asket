
<?
  $arSections = array();
  $second = false;
  foreach ($arResult['SECTIONS'] as $key => $item):
    $array = array('NAME'=>$item['NAME'], 'URL'=>$item['SECTION_PAGE_URL'], "CODE"=>$item['CODE'], 'ID' => $item['ID']);
    if(!isset($arSections[$item['DEPTH_LEVEL']]))
      $arSections[$item['DEPTH_LEVEL']] = array();
    if($item['DEPTH_LEVEL']==2) {
      if(!isset($arSections[$item['DEPTH_LEVEL']]))
        $arSections[$item['DEPTH_LEVEL']][$item['IBLOCK_SECTION_ID']] = array();
      $arSections[$item['DEPTH_LEVEL']][$item['IBLOCK_SECTION_ID']][] = $array;
    }
    else
      $arSections[$item['DEPTH_LEVEL']][] = $array;
  endforeach;
  $arParams['SECTIONS_LIST'] = json_decode(htmlspecialchars_decode($arParams['SECTIONS_LIST']));

?>
<div class="breadcrumbs left">
  <div class="col-md-2 col-xs-2">
    <select>
      <?foreach ($arSections[1] as $item):?>
        <option <? if($arParams['SECTIONS_LIST'][0]==$item['CODE']) {
                    echo "selected";
                    $second = $item['ID'];
                  }?> value="<?=$item['URL']?>"><?=$item['NAME']?></option>
      <?endforeach;?>
    </select>
  </div>
  <div class="col-md-3 col-xs-3">
    <select>
      <?foreach ($arSections[2][$second] as $item):?>
        <option <?=($arParams['SECTIONS_LIST'][1]==$item['CODE']?"selected":"")?> value="<?=$item['URL']?>"><?=$item['NAME']?></option>
      <?endforeach;?>
    </select>
  </div>
  <div class="col-md-7 col-xs-7"><?=$arParams['NAME']?></div>
</div>