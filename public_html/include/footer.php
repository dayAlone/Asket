</div>
<?php
  $APPLICATION->IncludeComponent("bitrix:menu", "footer", array(
  "ROOT_MENU_TYPE"     => "footer",
  "MENU_CACHE_TYPE"    => "A",
  "MENU_CACHE_TIME"    => "3600",
  "MAX_LEVEL"          => "2",
  "CHILD_MENU_TYPE"    => "top",
  "USE_EXT"            => "Y",
  "DELAY"              => "N",
  "ALLOW_MULTI_SELECT" => "Y"
	),
	false
);
?>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-3">© 1993—<?=date("Y")?> ООО Аскет Авто» <br> Все права защищены</div>
      <div class="col-md-5 col-xs-5"><?=COption::GetOptionString("grain.customsettings","footer_contacts")?></div>
      <div class="col-md-3 col-xs-3"><?=COption::GetOptionString("grain.customsettings","footer_seo")?> </div>
    </div>
  </div>
</footer>
<div class="bg-fade"></div>
</body>
</html>