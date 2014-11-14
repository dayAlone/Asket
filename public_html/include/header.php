<!DOCTYPE html><html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=1100, user-scalable=no, initial-scale=.7, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
	$APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
	$APPLICATION->AddHeadScript('/layout/js/frontend.js');
  ?>
  <title><?php 
    $APPLICATION->ShowTitle();
    if($APPLICATION->GetCurDir()!='/') {
      $rsSites = CSite::GetByID(SITE_ID);
      $arSite = $rsSites->Fetch();
      echo ' | ' . $arSite['NAME'];
    }
    ?></title>
  <?
    $APPLICATION->ShowHead();
  ?>
  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
  <![endif]-->
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="container">
<header class="header">
  <div class="row no-padding">
    <div class="col-md-2 col-xs-2"><a href="/" class="header__logo"><img src="/layout/images/logo.png"></a></div>
    <div class="col-md-5 col-xs-5">
      <form class="header__search" action="/search/">
        <input type="text" placeholder="Я ищу..." name="q" class="header__search-text">
        <input type="submit" value="" class="header__search-submit"><span class="header__search-description">Введите в поле поиска запрос, например “Автокран”</span>
      </form>
    </div>
    <div class="col-md-3 col-xs-3">
      <div class="header__contacts">
        <div class="header__contacts-icon"></div>
        <div class="header__contacts-frame">
        	<?
        		$phones = preg_split("/\+7 /", COption::GetOptionString("grain.customsettings","header_phone"));
        		foreach ($phones as $key => $phone):
        			if(strlen($phone)>0):
        			?>
						<a href="tel:+7<?=preg_replace('/[^\dx+]/i', '', $phone)?>" class="header__contacts-number <?=($key==count($phones)-1?"header__contacts-number--last":"")?>">
							+7<?=str_replace("(", "<span>", str_replace(")", "</span>", $phone))?>
						</a><?=($key==count($phones)-1?"":"<br>")?>
        			<?
        			endif;
        		endforeach;
        	?>
        	</div>
      </div>
    </div>
    <div class="col-md-2 col-xs-2"><a data-toggle="modal" href="#callBack" data-target="#callBack" class="header__call">Бесплатный звонок</a></div>
  </div>
</header>
<?
  $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "dropdown", array(
      "IBLOCK_TYPE"  => "content",
      "IBLOCK_ID"    => "1",
      "SECTION_ID"   => "",
      "SECTION_CODE" => "",
      "TOP_DEPTH"    => "2",
      "CACHE_TYPE"   => "A",
      "CACHE_TIME"   => "36000",
  ),
  false
);
  $APPLICATION->IncludeComponent("bitrix:menu", "top", 
  array(
      "ALLOW_MULTI_SELECT" => "Y",
      "MENU_CACHE_TYPE"    => "A",
      "ROOT_MENU_TYPE"     => "top",
      "MAX_LEVEL"          => "1",
      ),
  false);
?>
