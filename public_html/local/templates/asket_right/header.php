<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<div class="frame clearfix">
  <div class="block main">
    <div class="row">
      <div class="col-md-9 col-xs-9 content">
      	<div class="row">
          <div class="col-md-9">
            <h1><?=$APPLICATION->AddBufferContent("page_title");?></h1>
          </div>
          <div class="col-md-3">
          	<?$APPLICATION->ShowViewContent('after_title');?>
          </div>
        </div>
        <?$APPLICATION->ShowViewContent('title');?>