<?
require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/include/catalog.php');
?>
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
                "IBLOCK_TYPE"  => "content",
                "IBLOCK_ID"    => "1",
                "SECTION_ID"   => $_GLOBALS['currentCatalogSection'],
                "SECTION_CODE" => "",
                "TOP_DEPTH"    => "2",
                "CACHE_TYPE"   => "A",
                "CACHE_TIME"   => "36000",
                "CACHE_NOTES"  => $_REQUEST['ELEMENT_CODE'],
                "SECTION_USER_FIELDS" => array("UF_SVG"),
            ),
            false
          );?>
          <div class="widget"><img src="/layout/images/ask.png"><a data-toggle="modal" href="#sendFaq" data-target="#sendFaq" class="button">Задать вопрос</a></div>
        </div>
        <div class="col-md-9 col-xs-9 content">
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