<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('О компании');
?>
<div class="row">
  <div class="col-md-5"><img src="/layout/images/pic.png"></div>
  <div class="col-md-7">
    <p class="highlight">ООО «Аскет-Авто» плодотворно работает на рынке с 2007 года, осуществляя продажу и выкуп б/у автотранспорта и спецтехники. Компания предлагает большой ассортимент различных марок и моделей по ценам ниже рыночных.<br>  Сотрудники «Аскет-Авто» — это высококвалифицированные менеджеры, способные ответить на любые вопросы клиента.</p>
  </div>
</div>
<h2>Преимущества приобретения подержанной<br> техники в «Аскет-Авто»:</h2>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "features_about", 
array(
  "IBLOCK_ID"   => 4,
  "NEWS_COUNT"  => "999",
  "SORT_BY1"    => "SORT",
  "SORT_ORDER1" => "DESC",
  "DETAIL_URL"  => "/news/#ELEMENT_CODE#/",
  "CACHE_TYPE"  => "A",
  "SET_TITLE"   => "N"
   ),
   false
);
?>
<h2>Обращайтесь к нам: мы всегда рады сотрудничеству!</h2>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>