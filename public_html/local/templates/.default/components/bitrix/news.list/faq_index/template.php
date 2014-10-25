<?$this->setFrameMode(true);?>
<?
  require_once($_SERVER['DOCUMENT_ROOT'].'/include/petrovich-php/petrovich.php');
?>
<div class="block faq">
  <div class="row">
    <div class="col-md-5 col-xs-5"><img src="./layout/images/faq.jpg" width="100%"><a data-toggle="modal" href="#sendFaq" data-target="#sendFaq" class="ask">Задать свой вопрос</a></div>
    <div class="col-md-7 col-xs-7">
      <h3>Ваши вопросы о технике</h3>
      <?foreach ($arResult['ITEMS'] as $item):?>
      <?
        $petrovich = new Petrovich(Petrovich::GENDER_MALE);
        $obParser = new CTextParser;
        $item["PREVIEW_TEXT"] = $obParser->strip_words($item["PREVIEW_TEXT"], 140);
        $name = $petrovich->firstname($item['PROPERTIES']['AUTHOR']['VALUE'], Petrovich::CASE_GENITIVE);
      ?>
      <p><small>Вопрос от <?=$name?>:<br></small><strong><?=$item['NAME']?></strong></p>
      <p><small>Ответ:<br></small><?=$item['PREVIEW_TEXT']?>...</p>
      <p class="big-line-height"><a href="/faq/">Читать далее</a></p>
      <?endforeach;?>
    </div>
  </div>
</div>