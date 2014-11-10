<?$this->setFrameMode(true);?>
<?
$item = $arResult;
$props = &$item["PROPS"];
?>
<div class="product">
  <h1><?=$item['NAME']?></h1>
  <table cellpadding="10">
    <tr>
      <td width="50%">
        <div class="big">
            <?foreach ($props['PHOTOS'] as $key => $value):?>
              <img src="<?=$value['small']?>" alt="">
            <?endforeach;?>
        </div>
      </td>
      <td width="50%" valign="top">
        
        
          <?
            $list = array(
              "YEAR"         => array("icon"=>1, "name"=> "Год выпуска", "width"=>17, "height"=>17),
              "STATUS"       => array("icon"=>2, "name"=> "Состояние",   "width"=>17, "height"=>17),
              "WORK"         => array("icon"=>3, "name"=> "Наработка",   "width"=>17, "height"=>17),
              "PLACE"        => array("icon"=>4, "name"=> "Нахождение",  "width"=>17, "height"=>17),
              "AVAILABILITY" => array("icon"=>5, "name"=> "Наличие",     "width"=>17, "height"=>17)
            );
            $i=1;
          ?>
          <table cellpadding="5">
          <?foreach ($list as $key => $value):?>
            <?if(isset($props[$key])):?>
              <tr>
                <td width="30"><img src="/layout/images/svg/i-<?=$value["icon"]?>.svg" width="<?=$value["icon"]?>" height="<?=$value["height"]?>"></td>
                <td class="title"><?=$value["name"]?></td>
                <td><?=$props[$key]?></td>
              </tr>
            <?endif;?>
          <?endforeach;?>
          </table>
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
        </div>
      </td>
    </tr>
  </table>
  <table cellpadding="10">
    <?
      $title = false;
      if(count($props['BODY'])>0):?>
        <?foreach ($props['BODY'] as $key=>$item):?>
          <?if($item['property_title']=="Y"):
            if(!$title) $title = true;
            ?>
            <tr>
              <td colspan="2"><?=$item['property_name']?></td>
            </tr>
            <?
          else:?>
            <tr>
              <td width="180"><?=$item['property_name']?>:</td>
              <td width=""><?=$item['property_value']?></td>
            </tr>
          <?
          endif;
          endforeach;
      endif;
      ?>
  </table>
            <div class="sub-tabs_content sub-tabs_content--active" id="params">
              
            
            
              


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