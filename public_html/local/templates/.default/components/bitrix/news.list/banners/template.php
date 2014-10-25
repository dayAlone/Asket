<?$this->setFrameMode(true);
  require_once($_SERVER['DOCUMENT_ROOT'].'/include/petrovich-php/petrovich.php');
?>
<div class="banners center">
  <?foreach ($arResult['ITEMS'] as $item):?>
    <a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></a>
  <?endforeach;?>
</div>