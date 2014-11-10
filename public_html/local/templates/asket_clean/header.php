<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/header.php') ?>
<div class="frame clearfix">
  <div class="block main">
    <div class="row">
      <div class="col-md-12">
      	<div class="row">
	      <div class="col-md-10 col-xs-10">
	        <h1><?=$APPLICATION->AddBufferContent("page_title");?></h1>
	      </div>
	      <div class="col-md-2 col-xs-2"><a href="http://s0s0.ru/pdf.php?url=<?=full_path()?>" target="_blank" class="print"><?=svg('print')?>Версия для печати</a></div>
	    </div>
        
      	<?$APPLICATION->ShowViewContent('title');?>