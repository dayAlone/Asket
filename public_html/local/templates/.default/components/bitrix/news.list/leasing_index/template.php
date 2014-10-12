<div class="block faq">
  <h3>Мы найдем решение, если у вас:</h3>
  <div class="select"><img src="./layout/images/trigger.png" class="trigger">
    <select id="leasing-select">
      <?foreach ($arResult['ITEMS'] as $item):?>
      <option data-url="<?=$item['PROPERTIES']['LINK']['VALUE']?>"><?=$item['NAME']?></option>
      <?endforeach;?>
    </select>
  </div>
  <p class="big-line-height">Наша компания готова предложить вам лизинг техники на выгодных условиях. Срок договора лизинга до 3 лет, авансовый платёж от 20%, равномерные или убывающие платежи.</p>
  <p class="big-line-height"><a href="/leasing/">Подробнее</a></p>
</div>