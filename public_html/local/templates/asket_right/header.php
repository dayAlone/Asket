<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<div class="frame clearfix">
  <div class="block main">
    <div class="row">
      <div class="col-md-9 col-xs-9 content">
        <h1><?=$APPLICATION->AddBufferContent("page_title");?></h1>
        <?$APPLICATION->ShowViewContent('title');?>