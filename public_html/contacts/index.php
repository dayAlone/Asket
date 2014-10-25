<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('О компании');
?>
<div class="row">
  <div class="col-md-3 col-xs-3"><img src="/layout/images/office.png" width="100%"></div>
  <div class="col-md-5 col-xs-5">
    <h2 class="no-margin-top small-margin-bottom">Центральный офис</h2>
    <p><strong>Телефоны:</strong><br>+7 (495) 781-50-78 - секретарь;<br>+7 (915) 071-17-74 - отдел автотранспорта, <br>спецтехники и оборудования.</p>
    <p><strong>E-mail:</strong> info@asket-auto.ru</p>
    <p><strong>Наш адрес:</strong> 117105, г. Москва, ул. Нагатинская, д. 1, стр. 1</p>
    <p><strong>Координаты для GPS:</strong> 55.683065, 37.624655</p>
  </div>
  <div class="col-md-4 col-xs-4">
    <h2 class="no-margin-top">Филиал в г. Кемерово <br>(продажа автокранов "Ивановец")</h2>
    <p><strong>Телефон: </strong>+7 (3842) 33-54-03</p>
    <p>Деменок Дмитрий Алексеевич</p>
    <p><strong>Адрес: </strong>г. Кемерово, ул. Тухачевского, <br>д.22а, офис 223</p>
  </div>
</div>
<div class="divider"></div>
<ul role="tablist" id="mapTabs" class="nav nav-tabs">
  <li class="active"><a href="#map-1" role="tab" data-toggle="tab">Центральный офис </a></li>
  <li><a href="#map-2" role="tab" data-toggle="tab">Филиал в г. Кемерово</a></li>
</ul><script src="http://api-maps.yandex.ru/2.1-dev/?lang=ru-RU&load=package.full" type="text/javascript"></script>
<div class="tab-content">
  <div id="map-1" class="tab-pane active">
    <div id="map_1" class="map"></div>
  </div>
  <div id="map-2" class="tab-pane">
    <div id="map_2" class="map"></div>
  </div>
</div>
<script type="text/javascript">
  ymaps.ready(function () {
  
  var myMap = new ymaps.Map('map_1', {
  center: [55.682737,37.625612],
  zoom: 15
  }),
  myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
  hintContent: 'RADIA Interactive'
  }, {
  // Опции.
  // Необходимо указать данный тип макета.
  iconLayout: 'default#image',
  // Своё изображение иконки метки.
  iconImageHref: '/layout/images/pointer.png',
  // Размеры метки.
  iconImageSize: [47, 48],
  // Смещение левого верхнего угла иконки относительно
  // её "ножки" (точки привязки).
  iconImageOffset: [-23, -48]
  });
  
  myMap.geoObjects.add(myPlacemark);
  
  var myMap2 = new ymaps.Map('map_2', { center: [55.336631,   86.132159], zoom: 15 });
  var myPlacemark2 = new ymaps.Placemark(myMap2.getCenter(), { hintContent: '' }, {
      iconLayout:      'default#image',
      iconImageHref:   '/layout/images/pointer.png',
      iconImageSize:   [47, 48],
      iconImageOffset: [-23, -48]
    })
    myMap2.geoObjects.add(myPlacemark2);
  })
  $('#mapTabs').on('shown.bs.tab',function(){
    if(myMap)
      myMap.container.fitToViewport()
    if(myMap2)
      myMap2.container.fitToViewport()
  })
  </script>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>