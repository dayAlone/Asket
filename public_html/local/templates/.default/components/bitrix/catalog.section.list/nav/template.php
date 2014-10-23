
<?
  $arSections = array();
  foreach ($arResult['SECTIONS'] as $key => $item):
    $array = array('NAME'=>$item['NAME'], 'URL'=>$item['SECTION_PAGE_URL'], "CODE"=>$item['CODE']);
    if(!isset($arSections[$item['DEPTH_LEVEL']]))
      $arSections[$item['DEPTH_LEVEL']] = array();
    if($item['DEPTH_LEVEL']==2) {
      if(!isset($arSections[$item['DEPTH_LEVEL']]))
        $arSections[$item['DEPTH_LEVEL']][$item['SECTION_ID']] = array();
      $arSections[$item['DEPTH_LEVEL']][$item['SECTION_ID']][] = $array;
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
        <option <?=($arParams['SECTIONS_LIST'][0]==$item['CODE']?"selected":"")?>><?=$item['NAME']?></option>
      <?endforeach;?>
    </select>
  </div>
  <div class="col-md-3 col-xs-3">
    <select>
      <option>Краны-манипуляторы</option>
      <option>Автокраны</option>
      <option>Мусоровозы, бункеровозы</option>
      <option>Легкие коммерческие автомобили</option>
    </select>
  </div>
  <div class="col-md-7 col-xs-7"><?=$arParams['NAME']?></div>
</div>