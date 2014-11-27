<?
require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/catalog.php');
if(strlen($_REQUEST['ELEMENT_CODE'])>0 && !isset($_GLOBALS['currentCatalogInnerSection']) && !isset($_GLOBALS['currentCatalogSection'])):?>
<div class="frame clearfix">
  <div class="block main">
<?else:?>
<div class="tabs">
  <div class="tabs__frame clearfix">
    <?
    $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "tabs", array(
      "IBLOCK_TYPE"  => "content",
      "IBLOCK_ID"    => "1",
      "SECTION_ID"   => "",
      "SECTION_CODE" => "",
      "TOP_DEPTH"    => "1",
      "CACHE_TYPE"   => "A",
      "CACHE_NOTES"  => $_GLOBALS['currentCatalogSection'],
      "CACHE_TIME"   => "36000",
      ),
      false
    );?>
    <div class="tabs__content visible">
       <div class="row">
        <div class="col-xs-3 col-md-3 side">
          <?
            $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sidebar", array(
                "IBLOCK_TYPE"         => "content",
                "IBLOCK_ID"           => "1",
                "SECTION_ID"          => $_GLOBALS['currentCatalogSection'],
                "SECTION_CODE"        => "",
                "TOP_DEPTH"           => "3",
                "CACHE_TYPE"          => "N",
                "SET_TITLE"   => "N",
                "CACHE_TIME"          => "36000",
                "CACHE_NOTES"         => $_REQUEST['ELEMENT_CODE'],
                "SECTION_USER_FIELDS" => array("UF_SVG","UF_ICON","UF_ICON_HOVER"),
                "CURRENT"             => $_GLOBALS['currentCatalogSection']
            ),
            false
          );
          $path     = preg_split('/\//', $APPLICATION->GetCurDir(), false, PREG_SPLIT_NO_EMPTY);
          $urls     = array();

          for ($i=0; $i < count($path); $i++)
            $urls[] = (isset($urls[$i-1])?$urls[$i-1]:"/").$path[$i].'/';

          $urls[]="/";
          global $banner;
          $banner = array("PROPERTY_PAGES" => $urls);

          $APPLICATION->IncludeComponent("bitrix:news.list", "banners", 
          array(
            "IBLOCK_ID"     => 8,
            "NEWS_COUNT"    => "99",
            "FILTER_NAME"   => "banner",
            "SORT_BY1"      => "SORT",
            "SORT_ORDER1"   => "ASC",
            "DETAIL_URL"    => "/",
            "PROPERTY_CODE" => array("LINK", "TARGET", "ALL", "PAGES"),
            "CACHE_TYPE"    => "A",
            "CACHE_FILTER"  => "Y",
            "SET_TITLE"     => "N"

             ),
             false
        );?>
          <?$APPLICATION->ShowViewContent('sidebar');?>
          <div class="widget"><img src="/layout/images/ask.png"><a data-toggle="modal" href="#sendFaq" data-target="#sendFaq" class="button">Задать вопрос</a></div>
        </div>
        <div class="col-md-9 col-xs-9 content">
<?endif;?>
<?/*
<div class="frame clearfix">
  <div class="block main">
    <div class="row">
      <div class="col-xs-3 col-md-3 sidebar">
        <?
            $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sidebar", array(
                "IBLOCK_TYPE"  => "content",
                "IBLOCK_ID"    => "1",
                "SECTION_ID"   => "",
                "SECTION_CODE" => "",
                "TOP_DEPTH"    => "2",
                "CACHE_TYPE"   => "A",
                "CACHE_TIME"   => "3600",
                "SECTION_USER_FIELDS" => array("UF_SVG"),
            ),
            false
        );?>
      </div>
      <div class="col-md-9 col-xs-9 content">
      	<div class="row">
          <div class="col-md-9">
            <h1><?=$APPLICATION->AddBufferContent("page_title");?></h1>
          </div>
          <div class="col-md-3">
          	<?$APPLICATION->ShowViewContent('after_title');?>
          </div>
        </div>
        <?$APPLICATION->ShowViewContent('title');?>*/?>